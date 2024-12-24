<?php
// app/helpers/navigation.php

/**
 * Obtém os breadcrumbs para a navegação
 * 
 * @return array Array com os itens do breadcrumb
 */
function getBreadcrumbs() {
    $currentRoute = getCurrentRoute();
    $breadcrumbs = [];
    
    // Mapeamento de rotas para nomes amigáveis
    $routeNames = [
        'member' => 'Área do Membro',
        'change-password' => 'Alterar Senha',
        'admin' => 'Administração',
        'rules' => 'Regras',
        'privacy-policy' => 'Política de Privacidade',
        'terms'  => 'Termos de Uso'
    ];
    
    // Separa a rota em segmentos
    $segments = explode('/', $currentRoute);
    $currentPath = '';
    
    foreach ($segments as $segment) {
        if (empty($segment)) continue;
        
        $currentPath .= '/' . $segment;
        
        // Obtém o nome amigável do segmento
        $name = isset($routeNames[$segment]) ? $routeNames[$segment] : ucfirst($segment);
        
        // Verifica se é o último segmento
        $isLast = ($currentPath === '/' . $currentRoute);
        
        $breadcrumbs[] = [
            'name' => $name,
            'url' => $currentPath,
            'active' => $isLast
        ];
    }
    
    return $breadcrumbs;
}

/**
 * Redireciona o usuário para sua página inicial apropriada
 */
function redirectToHome() {
    if (!isset($_SESSION)) {
        session_start();
    }
    
    if (!isset($_SESSION['member_id'])) {
        header('Location: /login');
        exit;
    }
    
    $route = $_SESSION['is_admin'] ? '/admin' : '/member';
    header("Location: $route");
    exit;
}