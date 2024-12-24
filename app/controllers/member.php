<?php
// app/controllers/member.php
require_once "app/controllers/auth.php"; // Para usar checkAuth
require_once "app/models/auth.php"; // Para usar updatePassword

function index() {
    checkAuth();
    require "app/views/member/index.php";
}

require_once "app/models/member/password.php";

function password_change() {
    if (!isset($_SESSION)) {
        session_start();
    }
    
    checkAuth();
    
    // Se houver mensagem de sucesso, pega e limpa da sessão
    $success = isset($_SESSION['password_success']) ? $_SESSION['password_success'] : '';
    $error = isset($_SESSION['password_error']) ? $_SESSION['password_error'] : '';
    unset($_SESSION['password_success']);
    unset($_SESSION['password_error']);
    
    require "app/views/member/password.php";
}

function password_process() {
    if (!isset($_SESSION)) {
        session_start();
    }
    
    checkAuth();
    
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        header('Location: /member/change-password');
        exit;
    }
    
    $currentPassword = $_POST['current_password'] ?? '';
    $newPassword = $_POST['new_password'] ?? '';
    $confirmPassword = $_POST['confirm_password'] ?? '';
    
    // Validações
    if (empty($currentPassword) || empty($newPassword) || empty($confirmPassword)) {
        $_SESSION['password_error'] = 'Todos os campos são obrigatórios';
        header('Location: /member/change-password');
        exit;
    }
    
    if (strlen($newPassword) < 6) {
        $_SESSION['password_error'] = 'A nova senha deve ter no mínimo 6 caracteres';
        header('Location: /member/change-password');
        exit;
    }
    
    if ($newPassword !== $confirmPassword) {
        $_SESSION['password_error'] = 'As senhas não conferem';
        header('Location: /member/change-password');
        exit;
    }
    
    if (updatePassword($_SESSION['member_id'], $currentPassword, $newPassword)) {
        $_SESSION['password_success'] = 'Senha alterada com sucesso!';
        header('Location: /member/change-password');
        exit;
    } else {
        $_SESSION['password_error'] = 'Senha atual incorreta';
        header('Location: /member/change-password');
        exit;
    }
}

function process_loan() {
    checkAuth();
    
    error_log("Iniciando processamento de empréstimo"); // Log para debug
    
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        echo json_encode(['success' => false, 'error' => 'Método não permitido']);
        exit;
    }
    
    $postData = file_get_contents('php://input');
    error_log("Dados recebidos: " . $postData); // Log para debug
    
    // Pega e valida o valor
    $amount = filter_input(INPUT_POST, 'amount', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    error_log("Valor filtrado: " . $amount); // Log para debug
    
    if (!$amount || $amount <= 0) {
        echo json_encode(['success' => false, 'error' => 'Valor inválido']);
        exit;
    }
    
    // Processa o empréstimo
    require_once "app/models/member.php"; // Certifique-se que está incluindo o modelo
    $result = requestLoan($_SESSION['member_id'], $amount);
    
    error_log("Resultado do processamento: " . json_encode($result)); // Log para debug
    
    echo json_encode($result);
    exit;
}
