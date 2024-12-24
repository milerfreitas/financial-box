<?php
// app/config/routes.php
require_once 'app/helpers/navigation.php';
require_once 'app/helpers/view.php';

// Define rotas públicas (não precisam de autenticação)
$public_routes = [
    'login',
    'register',
    'register/success'
];

// Definição das rotas e seus controllers/views correspondentes
// app/config/routes.php
$routes = [
    '' => 'auth/auth/login',
    'login' => 'auth/auth/login',
    'logout' => 'auth/auth/logout',
    'register' => 'auth/registration/register',
    'register/success' => 'auth/registration/success',
    
    // Padronizando nomenclatura das rotas
    'member' => 'member/dashboard/index',
    'member/rules' => 'member/pages/rules',
    'member/loan/process' => 'member/loan/process',
    'member/password/change' => 'member/settings/password_change',
    'member/password/process' => 'member/settings/password_process',
    'member/privacy' => 'member/pages/privacy',
    'member/terms' => 'member/pages/terms',
];

// Rotas que precisam de controller
$controller_routes = [
    'login' => true,
    'logout' => true,
    'register' => true,
    'register/success' => true,
    'member' => true,
    'member/process-loan' => true,
    'member/change-password' => true,
    'member/process-password' => true,
];

function cleanUrl($url) {
    $url = trim($url, '/');
    return filter_var($url, FILTER_SANITIZE_URL);
}

function getCurrentRoute() {
    $url = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '/';
    $url = explode('?', $url)[0];
    return cleanUrl($url);
}

function isPublicRoute($route) {
    global $public_routes;
    return in_array($route, $public_routes);
}

function router() {
    global $routes, $controller_routes;
    $currentRoute = getCurrentRoute();
    
    // Inicia a sessão se não estiver iniciada
    if (!isset($_SESSION)) {
        session_start();
    }

    // Redireciona para área apropriada se estiver na rota base
    if ($currentRoute === '') {
        if (isset($_SESSION['member_id'])) {
            $route = $_SESSION['is_admin'] ? '/admin' : '/member';
            header("Location: $route");
            exit;
        }
    }
    
    // Verifica autenticação para rotas protegidas
    if (!isPublicRoute($currentRoute) && !isset($_SESSION['member_id'])) {
        header('Location: /login');
        exit;
    }
    
    if (isset($routes[$currentRoute])) {
        $path = $routes[$currentRoute];
        
        // Verifica se a rota precisa de controller
        if (isset($controller_routes[$currentRoute])) {
            $parts = explode('/', $path);
            $controller = $parts[0] ?? '';
            $subcontroller = $parts[1] ?? '';
            $action = $parts[2] ?? '';
            
            if ($controller && $subcontroller) {
                $controllerFile = "app/controllers/{$controller}/{$subcontroller}.php";
                
                if (file_exists($controllerFile)) {
                    require_once $controllerFile;
                    if (function_exists($action)) {
                        $action();
                        return;
                    }
                }
            }
        }
        
        renderPage($path);
    } else {
        http_response_code(404);
        require_once "app/views/error-404.html";
    }
}