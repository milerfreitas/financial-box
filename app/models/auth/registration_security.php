<?php
// app/models/auth/registration_security.php

function getDeviceFingerprint() {
    $data = [
        'ip' => $_SERVER['REMOTE_ADDR'],
        'user_agent' => $_SERVER['HTTP_USER_AGENT'],
        'accept_language' => $_SERVER['HTTP_ACCEPT_LANGUAGE'] ?? '',
        'screen' => $_POST['screen_data'] ?? '',
        'timezone' => $_POST['timezone'] ?? '',
        'platform' => $_POST['platform'] ?? '',
        'cookies_enabled' => $_POST['cookies_enabled'] ?? ''
    ];
    
    return hash('sha256', json_encode($data));
}

function checkRegistrationAttempts($cpf, $lessStrict = false) {
    $conn = connectDb();
    $errors = [];
    
    // Limpa o CPF
    $cpf = preg_replace('/[^0-9]/', '', $cpf);
    
    // Verifica tentativas recentes do mesmo IP
    $ip = $_SERVER['REMOTE_ADDR'];
    $ipThreshold = $lessStrict ? 5 : 3;
    
    $stmt = $conn->prepare("
        SELECT COUNT(*) as count 
        FROM registration_attempts 
        WHERE ip_address = ? 
        AND created_at > NOW() - INTERVAL 24 HOUR
    ");
    
    $stmt->bind_param('s', $ip);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();
    
    if ($result['count'] >= $ipThreshold) {
        $errors[] = 'Muitas tentativas de registro deste IP. Tente novamente mais tarde.';
    }
    
    // Verifica CPFs similares do mesmo IP
    $stmt = $conn->prepare("
        SELECT cpf 
        FROM registration_attempts 
        WHERE ip_address = ? 
        AND created_at > NOW() - INTERVAL 24 HOUR
    ");
    
    $stmt->bind_param('s', $ip);
    $stmt->execute();
    $result = $stmt->get_result();
    
    $cpfs = [];
    while ($row = $result->fetch_assoc()) {
        $cpfs[] = $row['cpf'];
    }
    
    if (count($cpfs) > 0) {
        foreach ($cpfs as $registered_cpf) {
            // Se os CPFs são muito parecidos (diferem em poucos dígitos)
            if (levenshtein($cpf, $registered_cpf) <= 4) {
                $errors[] = 'Detectada tentativa suspeita de registro.';
                break;
            }
        }
    }
    
    // Verifica dispositivos
    $deviceFingerprint = getDeviceFingerprint();
    $deviceThreshold = $lessStrict ? 5 : 3;
    
    $stmt = $conn->prepare("
        SELECT COUNT(*) as count 
        FROM registration_attempts 
        WHERE JSON_EXTRACT(device_data, '$.fingerprint') = ?
        AND created_at > NOW() - INTERVAL 24 HOUR
    ");
    
    $stmt->bind_param('s', $deviceFingerprint);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();
    
    if ($result['count'] >= $deviceThreshold) {
        $errors[] = 'Muitas tentativas de registro deste dispositivo.';
    }
    
    // Registra a tentativa
    $deviceData = json_encode([
        'fingerprint' => $deviceFingerprint,
        'user_agent' => $_SERVER['HTTP_USER_AGENT'],
        'screen_data' => $_POST['screen_data'] ?? null,
        'timezone' => $_POST['timezone'] ?? null,
        'platform' => $_POST['platform'] ?? null
    ]);
    
    $status = empty($errors) ? 'success' : 'suspicious';
    
    $stmt = $conn->prepare("
        INSERT INTO registration_attempts (
            cpf, ip_address, user_agent, device_data, status
        ) VALUES (?, ?, ?, ?, ?)
    ");
    
    $userAgent = $_SERVER['HTTP_USER_AGENT'];
    $stmt->bind_param('sssss', $cpf, $ip, $userAgent, $deviceData, $status);
    $stmt->execute();
    
    $conn->close();
    
    return $errors;
}

function isBlocked($cpf) {
    $conn = connectDb();
    $ip = $_SERVER['REMOTE_ADDR'];
    
    // Verifica se o IP ou CPF estão bloqueados
    $stmt = $conn->prepare("
        SELECT COUNT(*) as count 
        FROM registration_attempts 
        WHERE (ip_address = ? OR cpf = ?) 
        AND status = 'blocked'
        AND created_at > NOW() - INTERVAL 24 HOUR
    ");
    
    $stmt->bind_param('ss', $ip, $cpf);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();
    
    $conn->close();
    
    return $result['count'] > 0;
}

function isIPBlocked($ip) {
    $conn = connectDb();
    
    // Verifica tentativas nos últimos 5 minutos
    $stmt = $conn->prepare("
        SELECT COUNT(*) as count 
        FROM registration_attempts 
        WHERE ip_address = ?
        AND created_at > NOW() - INTERVAL 5 MINUTE
    ");
    
    $stmt->bind_param('s', $ip);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();
    
    if ($result['count'] >= 10) {  // 10 tentativas em 5 minutos = block
        $conn->close();
        return true;
    }
    
    // Verifica tentativas suspeitas nas últimas 2 horas
    $stmt = $conn->prepare("
        SELECT COUNT(*) as count 
        FROM registration_attempts 
        WHERE ip_address = ?
        AND status = 'suspicious'
        AND created_at > NOW() - INTERVAL 2 HOUR
    ");
    
    $stmt->bind_param('s', $ip);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();
    
    $conn->close();
    
    // Bloqueia se houver 8 ou mais tentativas suspeitas em 2 horas
    return $result['count'] >= 8;
}
