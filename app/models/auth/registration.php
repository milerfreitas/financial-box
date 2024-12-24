<?php
// app/models/auth/registration.php

require_once "app/config/database.php";

function generateMemberCode() {
    // Gera um código único de 12 caracteres alfanuméricos
    $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
    $code = '';
    
    do {
        $code = '';
        for ($i = 0; $i < 12; $i++) {
            $code .= $characters[rand(0, strlen($characters) - 1)];
        }
        
        // Verifica se o código já existe
        $conn = connectDb();
        $stmt = $conn->prepare("SELECT id FROM members WHERE member_code = ?");
        $stmt->bind_param('s', $code);
        $stmt->execute();
        $result = $stmt->get_result();
        $exists = $result->num_rows > 0;
        $stmt->close();
        $conn->close();
        
    } while ($exists);
    
    return $code;
}

function getMembersCount() {
    $conn = connectDb();
    $result = $conn->query("SELECT COUNT(*) as total FROM members");
    $count = $result->fetch_assoc()['total'];
    $conn->close();
    return $count;
}

function isRegistrationOpen() {
    return getMembersCount() < 60;
}

function validateCPF($cpf) {
    // Remove caracteres não numéricos
    $cpf = preg_replace('/[^0-9]/', '', $cpf);
    
    // Verifica se tem 11 dígitos
    if (strlen($cpf) != 11) {
        return false;
    }
    
    // Verifica se todos os dígitos são iguais
    if (preg_match('/^(\d)\1*$/', $cpf)) {
        return false;
    }
    
    // Calcula os dígitos verificadores
    for ($t = 9; $t < 11; $t++) {
        for ($d = 0, $c = 0; $c < $t; $c++) {
            $d += $cpf[$c] * (($t + 1) - $c);
        }
        $d = ((10 * $d) % 11) % 10;
        if ($cpf[$c] != $d) {
            return false;
        }
    }
    
    return true;
}

function registerMember($data) {
    if (!isRegistrationOpen()) {
        return [
            'success' => false,
            'error' => 'O período de cadastro foi encerrado.'
        ];
    }
    
    // Validações
    if (!validateCPF($data['cpf'])) {
        return [
            'success' => false,
            'error' => 'CPF inválido.'
        ];
    }
    
    if ($data['password'] !== $data['password_confirmation']) {
        return [
            'success' => false,
            'error' => 'As senhas não conferem.'
        ];
    }

    if (strlen($data['password']) < 6) {
        return [
            'success' => false,
            'error' => 'A senha deve ter pelo menos 6 caracteres.'
        ];
    }
    
    $conn = connectDb();
    
    // Gera código único do membro
    $memberCode = generateMemberCode();
    
    // Prepara a senha
    $password = password_hash($data['password'], PASSWORD_DEFAULT);
    
    // Limpa o telefone e o CPF
    $phone = preg_replace('/[^0-9]/', '', $data['phone']);
    $cpf = preg_replace('/[^0-9]/', '', $data['cpf']);
    
    // Prepara o endereço como JSON
    $address = [
        'zipcode' => preg_replace('/[^0-9]/', '', $data['address_zipcode']),
        'formatted_zipcode' => substr(preg_replace('/[^0-9]/', '', $data['address_zipcode']), 0, 5) . '-' . 
                             substr(preg_replace('/[^0-9]/', '', $data['address_zipcode']), 5),
        'street' => $data['address_street'],
        'number' => $data['address_number'],
        'complement' => $data['address_complement'] ?? '',
        'district' => $data['address_district'],
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
    ];
    
    // Insere o novo membro
    $stmt = $conn->prepare("
        INSERT INTO members (
            name, cpf, phone, pix_key, bank, member_code, password, address
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?)
    ");
    
    $addressJson = json_encode($address, JSON_UNESCAPED_UNICODE);
    
    $stmt->bind_param(
        'ssssssss',
        $data['name'],
        $cpf,
        $phone,
        $data['pix_key'],
        $data['bank'],
        $memberCode,
        $password,
        $addressJson
    );
    
    $success = $stmt->execute();
    $memberId = $stmt->insert_id;
    $stmt->close();
    
    if ($success) {
        // Insere as cotas do membro
        $stmt = $conn->prepare("
            INSERT INTO shares (member_id, quantity)
            VALUES (?, ?)
        ");
        
        $quotaQuantity = intval($data['quota_quantity']);
        $stmt->bind_param('ii', $memberId, $quotaQuantity);
        $stmt->execute();
        $stmt->close();
        
        $conn->close();
        return [
            'success' => true,
            'member_code' => $memberCode
        ];
    }
    
    $conn->close();
    return [
        'success' => false,
        'error' => 'Erro ao cadastrar. Tente novamente.'
    ];
}

// Função auxiliar para recuperar endereço formatado
function getFormattedAddress($address) {
    if (!is_array($address)) {
        return '';
    }
    
    $street = $address['street'] ?? '';
    $number = $address['number'] ?? '';
    $complement = $address['complement'] ?? '';
    $district = $address['district'] ?? '';
    $zipcode = $address['zipcode'] ?? '';
    
    return sprintf(
        "%s, %s%s\n%s\nCEP: %s",
        htmlspecialchars($street),
        htmlspecialchars($number),
        $complement ? ' - ' . htmlspecialchars($complement) : '',
        htmlspecialchars($district),
        htmlspecialchars($zipcode)
    );
}

function checkExistingFields($cpf, $phone, $pixKey) {
    $conn = connectDb();
    $errors = [];
    
    // Limpa os campos antes de verificar
    $cpf = preg_replace('/[^0-9]/', '', $cpf);
    $phone = preg_replace('/[^0-9]/', '', $phone);
    
    // Verifica se CPF já está cadastrado
    $stmt = $conn->prepare("SELECT id FROM members WHERE cpf = ?");
    $stmt->bind_param('s', $cpf);
    $stmt->execute();
    
    if ($stmt->get_result()->num_rows > 0) {
        $errors[] = 'CPF já cadastrado.';
    }
    $stmt->close();
    
    // Verifica se telefone já está cadastrado
    $stmt = $conn->prepare("SELECT id FROM members WHERE phone = ?");
    $stmt->bind_param('s', $phone);
    $stmt->execute();
    
    if ($stmt->get_result()->num_rows > 0) {
        $errors[] = 'Telefone já cadastrado.';
    }
    $stmt->close();
    
    // Verifica se chave PIX já está cadastrada
    $stmt = $conn->prepare("SELECT id FROM members WHERE pix_key = ?");
    $stmt->bind_param('s', $pixKey);
    $stmt->execute();
    
    if ($stmt->get_result()->num_rows > 0) {
        $errors[] = 'Chave PIX já cadastrada.';
    }
    $stmt->close();
    
    $conn->close();
    return $errors;
}