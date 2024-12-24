<?php
// app/helpers/view.php

/**
 * Renderiza uma view ou componente
 * 
 * @param string $view Caminho da view
 * @param array $data Dados a serem passados para a view
 * @return string
 */
function view($view, $data = []) {
    // Extrai variáveis do array para a view
    if (!empty($data)) {
        extract($data);
    }
    
    $viewPath = "app/views/{$view}.php";
    
    if (!file_exists($viewPath)) {
        throw new Exception("View {$view} não encontrada");
    }
    
    // Inicia o buffer de saída
    ob_start();
    require $viewPath;
    return ob_get_clean();
}

/**
 * Renderiza o layout completo com header e footer
 * 
 * @param string $view View principal a ser renderizada
 * @param array $data Dados para a view
 * @param string $title Título da página
 * @param string $layout Layout a ser usado (main ou auth)
 */
function renderLayout($view, $data = [], $title = 'Caixinha', $layout = 'main') {
    $content = view($view, $data);
    
    // Dados padrão para todas as views
    $layoutData = array_merge($data, [
        'title' => $title,
        'content' => $content
    ]);
    
    // Se não for auth, adiciona os breadcrumbs
    if ($layout !== 'auth') {
        $layoutData['breadcrumbs'] = getBreadcrumbs();
    }
    
    // Renderiza o layout base
    print view("layouts/{$layout}", $layoutData);
}

/**
 * Renderiza uma página completa
 * 
 * @param string $page Caminho da página a ser renderizada
 */
function renderPage($page) {
    require_once "app/controllers/auth/auth.php";
    
    // Lista de rotas públicas que não precisam de autenticação
    $public_routes = [
        'auth/login',
        'registration/register',
        'registration/registerSuccess'
    ];
    
    // Só verifica autenticação se não for uma rota pública
    if (!in_array($page, $public_routes)) {
        checkAuth();
    }
    
    $viewPath = "app/views/{$page}.php";
    
    if (file_exists($viewPath)) {
        require_once $viewPath;
    } else {
        http_response_code(404);
        require_once "app/views/error-404.html";
    }
}