<?php
// app/controllers/auth/registration.php
require_once 'app/models/auth/registration.php';
require_once 'app/models/auth/registration_security.php';

/**
 * Processa o registro de novo membro
 */
function register() {
    if (!isset($_SESSION)) {
        session_start();
    }
    
    // Verifica se o registro está aberto
    if (!isRegistrationOpen()) {
        renderLayout('auth/register-closed');
        return;
    }
    
    // Verifica se o IP está bloqueado
    $ipAddress = $_SERVER['REMOTE_ADDR'];
    if (isIPBlocked($ipAddress)) {
        renderLayout('auth/register-blocked');
        return;
    }
    
    // Se for POST, processa o cadastro
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = [
            'name' => $_POST['name'] ?? '',
            'cpf' => $_POST['cpf'] ?? '',
            'phone' => $_POST['phone'] ?? '',
            'pix_key' => $_POST['pix_key'] ?? '',
            'bank' => $_POST['bank'] ?? '',
            'quota_quantity' => (int)($_POST['quota_quantity'] ?? 1),
            'password' => $_POST['password'] ?? '',
            'password_confirmation' => $_POST['password_confirmation'] ?? '',
            'address_zipcode' => $_POST['address_zipcode'] ?? '',
            'address_street' => $_POST['address_street'] ?? '',
            'address_number' => $_POST['address_number'] ?? '',
            'address_complement' => $_POST['address_complement'] ?? '',
            'address_district' => $_POST['address_district'] ?? ''
        ];

        // Verifica se CPF, telefone ou chave PIX já estão cadastrados
        $existingFields = checkExistingFields($data['cpf'], $data['phone'], $data['pix_key']);
        if (!empty($existingFields)) {
            $_SESSION['register_error'] = implode(' ', $existingFields);
            $_SESSION['register_data'] = $data;
            header('Location: /register');
            exit;
        }
        
        // Verifica se está bloqueado
        if (isBlocked($data['cpf'])) {
            $_SESSION['register_error'] = 'Registro temporariamente bloqueado. Tente novamente mais tarde.';
            $_SESSION['register_data'] = $data;
            header('Location: /register');
            exit;
        }
        
        // Verifica tentativas suspeitas (ajustado para ser menos rigoroso)
        $securityErrors = checkRegistrationAttempts($data['cpf'], $lessStrict = true);
        if (!empty($securityErrors)) {
            $_SESSION['register_error'] = implode(' ', $securityErrors);
            $_SESSION['register_data'] = $data;
            header('Location: /register');
            exit;
        }
        
        $result = registerMember($data);

        if ($result['success']) {
            // Constrói o array $address com os dados do endereço
            $address = [
                'zipcode' => $data['address_zipcode'],
                'street' => $data['address_street'],
                'number' => $data['address_number'],
                'complement' => $data['address_complement'],
                'district' => $data['address_district']
            ];

            $_SESSION['register_success'] = 'Cadastro realizado com sucesso! Seu código de membro é: ' . $result['member_code'];
            $_SESSION['member_code'] = $result['member_code'];
            $_SESSION['name'] = $data['name'];
            $_SESSION['cpf'] = $data['cpf'];
            $_SESSION['phone'] = $data['phone'];
            $_SESSION['pix_key'] = $data['pix_key'];
            $_SESSION['bank'] = $data['bank'];
            $_SESSION['quota_quantity'] = $data['quota_quantity'];
            $_SESSION['address'] = $address;
            header('Location: /register/success');
            exit;
        } else {
            $_SESSION['register_error'] = $result['error'];
            $_SESSION['register_data'] = $data;
            header('Location: /register');
            exit;
        }
    }
    
    // Se chegou aqui, mostra o formulário
    $error = $_SESSION['register_error'] ?? '';
    $formData = $_SESSION['register_data'] ?? [];
    unset($_SESSION['register_error'], $_SESSION['register_data']);
    
    print view('auth/register', [
        'error' => $error,
        'formData' => $formData
    ]);
}

/**
 * Exibe a página de sucesso do registro
 */
function registerSuccess() {
    if (!isset($_SESSION)) {
        session_start();
    }
    
    if (!isset($_SESSION['member_code'])) {
        header('Location: /register');
        exit;
    }
    
    $memberCode = $_SESSION['member_code'];
    unset($_SESSION['member_code']);
    
    renderLayout('auth/register-success', [
        'memberCode' => $memberCode
    ], 'Cadastro Realizado');
}