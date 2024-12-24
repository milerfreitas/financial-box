<?php
// app/controllers/member/dashboard.php

require_once 'app/controllers/auth/auth.php';
require_once 'app/models/member/dashboard.php';

/**
 * Exibe a página inicial do membro
 */
function index() {
    checkAuth();
    
    $dashboardData = getDashboardData($_SESSION['member_id']);
    
    renderLayout('member/dashboard', [
        'dashboardData' => $dashboardData
    ], 'Dashboard');
}
