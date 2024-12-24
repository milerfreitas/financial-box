<?php
// app/controllers/member/loan.php

require_once 'app/controllers/auth/auth.php';
require_once 'app/config/database.php';
require_once 'app/helpers/telegram.php';

/**
 * Processa a solicitação de empréstimo
 */
function process() {
    checkAuth();
    
    // Limpa qualquer saída anterior
    ob_clean();
    header('Content-Type: application/json');
    
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        http_response_code(400);
        print json_encode(['error' => 'Requisição inválida']);
        exit;
    }
    
    // Recebe e valida os dados
    $input = file_get_contents('php://input');
    $data = json_decode($input, true);
    
    if (!$data || !isset($data['amount'])) {
        http_response_code(400);
        print json_encode(['error' => 'Dados inválidos']);
        exit;
    }
    
    // Processa o valor do empréstimo
    $loanAmount = str_replace(['R$', ' '], '', $data['amount']);
    $loanAmount = str_replace('.', '', $loanAmount);
    $loanAmount = str_replace(',', '.', $loanAmount);
    $loanAmount = (float) $loanAmount;
    
    if ($loanAmount < 100 || $loanAmount > 5000) {
        http_response_code(400);
        print json_encode(['error' => 'Valor do empréstimo fora dos limites permitidos']);
        exit;
    }
    
    // Busca informações do membro
    $conn = connectDb();
    $sql = "SELECT name, pix_key FROM members WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $_SESSION['member_id']);
    $stmt->execute();
    $result = $stmt->get_result();
    $member = $result->fetch_assoc();
    
    // Prepara a mensagem para o Telegram
    $message = "<b>Novo Pedido de Empréstimo</b>\n\n"
             . "Nome: " . htmlspecialchars($member['name']) . "\n"
             . "Valor: R$ " . number_format($loanAmount, 2, ',', '.') . "\n"
             . "Chave PIX: " . htmlspecialchars($member['pix_key']) . "\n"
             . "Data da Solicitação: Pedido feito em " . date('d/m/Y \à\s H:i') . "\n\n"
             . "#pedidoEmprestimo";
    
    // Envia para o Telegram usando o helper
    if (sendToTelegram($message)) {
        print json_encode(['success' => true]);
    } else {
        http_response_code(500);
        print json_encode(['error' => 'Erro ao processar o pedido']);
    }
    exit;
}