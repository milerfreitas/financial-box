<?php
// app/controllers/auth/auth.php

require_once 'app/models/auth/auth.php';
//require_once 'app/helpers/navigation.php';

/**
 * Processa o login do usuário
 */
function login() {
    if (!isset($_SESSION)) {
        session_start();
    }

    // Se já estiver logado, redireciona
    if (isset($_SESSION['member_id'])) {
        redirectToHome();
        exit;
    }

    // Processa o login em POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $cpf = isset($_POST['cpf']) ? preg_replace('/[^0-9]/', '', $_POST['cpf']) : '';
        $password = $_POST['password'] ?? '';
        
        $member = authenticateUser($cpf, $password);
        
        if ($member) {
            $_SESSION['member_id'] = $member['id'];
            $_SESSION['member_name'] = $member['name'];
            $_SESSION['member_code'] = $member['member_code'];
            $_SESSION['member_pix_key'] = $member['pix_key'];
            $_SESSION['is_admin'] = $member['is_admin'];
            
            redirectToHome();
            exit;
        }
        
        $_SESSION['login_error'] = 'CPF ou senha inválidos';
        header('Location: /login');
        exit;
    }
    
    // Mostra página de login
    $error = $_SESSION['login_error'] ?? '';
    unset($_SESSION['login_error']);
    
    //renderLayout('auth/login', ['error' => $error], 'Login', 'auth');
    print view('auth/login', ['error' => $error]);
}

/**
 * Processa o logout do usuário
 */
function logout() {
    session_start();
    session_destroy();
    header('Location: /login');
    exit;
}

/**
 * Verifica se o usuário está autenticado
 * 
 * @param bool $requireAdmin Se true, verifica também se é admin
 */
function checkAuth($requireAdmin = false) {
    if (!isset($_SESSION)) {
        session_start();
    }
    
    if (!isset($_SESSION['member_id'])) {
        header('Location: /login');
        exit;
    }
    
    if ($requireAdmin && !$_SESSION['is_admin']) {
        header('Location: /member');
        exit;
    }
}
