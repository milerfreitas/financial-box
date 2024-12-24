<?php
// app/controllers/member/settings.php
require_once 'app/controllers/auth/auth.php';
require_once 'app/models/member/password.php';

/**
 * Exibe o formulário de alteração de senha
 */
function password_change() {
    checkAuth();
    
    $success = $_SESSION['password_success'] ?? '';
    $error = $_SESSION['password_error'] ?? '';
    unset($_SESSION['password_success'], $_SESSION['password_error']);
    
    renderLayout('member/password', [
        'success' => $success,
        'error' => $error
    ], 'Alterar Senha');
}

/**
 * Processa a alteração de senha
 */
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
    } else {
        $_SESSION['password_error'] = 'Senha atual incorreta';
    }
    
    header('Location: /member/change-password');
    exit;
}