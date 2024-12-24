<?php
// app/helpers/security.php
function generateCSRFToken() {
    if (!isset($_SESSION)) {
        session_start();
    }
    
    $token = bin2hex(random_bytes(32));
    $_SESSION['csrf_token'] = $token;
    $_SESSION['csrf_token_time'] = time();
    
    return $token;
}

function validateCSRFToken($token) {
    if (!isset($_SESSION['csrf_token']) || 
        !isset($_SESSION['csrf_token_time'])) {
        return false;
    }
    
    $config = getConfig('security');
    $tokenTimeout = $config['csrf_token_time'];
    
    if (time() - $_SESSION['csrf_token_time'] > $tokenTimeout) {
        unset($_SESSION['csrf_token'], $_SESSION['csrf_token_time']);
        return false;
    }
    
    return hash_equals($_SESSION['csrf_token'], $token);
}

function sanitizeOutput($data) {
    if (is_array($data)) {
        return array_map('sanitizeOutput', $data);
    }
    return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
}

function sanitizeInput($data) {
    if (is_array($data)) {
        return array_map('sanitizeInput', $data);
    }
    return trim(strip_tags($data));
}