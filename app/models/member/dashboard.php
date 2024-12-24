<?php
// app/models/dashboard.php

function getDashboardData($memberId) {
    $conn = connectDb();
    $data = [];
    
    // 1. Buscar a quantidade total de cotas
    $sql = "SELECT SUM(quantity) as total_cotas FROM shares WHERE member_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $memberId);
    $stmt->execute();
    $result = $stmt->get_result();
    $quotasData = $result->fetch_assoc();

    // 2. Buscar o valor da cota do membro (pegando o mais recente)
    $sql = "SELECT share_value FROM shares WHERE member_id = ? ORDER BY created_at DESC LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $memberId);
    $stmt->execute();
    $result = $stmt->get_result();
    $shareValueData = $result->fetch_assoc();
    
    // 3. Calcula o total realmente pago pelo membro
    $sql = "SELECT COALESCE(SUM(amount), 0) as total_pago 
            FROM payments 
            WHERE member_id = ? AND status = 'paid'";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $memberId);
    $stmt->execute();
    $result = $stmt->get_result();
    $paymentsData = $result->fetch_assoc();
    
    // Organizando os dados das cotas
    $valorCota = $shareValueData['share_value'] ?? 100.00;
    $totalCotas = $quotasData['total_cotas'] ?? 0;
    
    $data['quotas'] = [
        'total' => $totalCotas,
        'valor_cota' => $valorCota,
        'valor_total' => $totalCotas * $valorCota,
        'total_pago' => $paymentsData['total_pago']
    ];

    // Verifica pagamento do mês atual
    $sql = "SELECT * FROM payments 
            WHERE member_id = ? 
            AND payment_month = MONTH(CURRENT_DATE()) 
            AND payment_year = YEAR(CURRENT_DATE()) 
            LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $memberId);
    $stmt->execute();
    $result = $stmt->get_result();
    $pagamentoAtual = $result->fetch_assoc();

    // Verifica status do pagamento
    $diaAtual = (int)date('d');
    $diaAtual = 1;
    $diasRestantes = 10 - $diaAtual;

    $data['quotas']['status_pagamento'] = [
        'tem_pagamento' => !is_null($pagamentoAtual),
        'status' => $pagamentoAtual['status'] ?? null,
        'atrasado' => $diaAtual > 10 && (!$pagamentoAtual || $pagamentoAtual['status'] === 'pending'),
        'proximo_vencimento' => $diaAtual <= 10 && $diasRestantes <= 5 && (!$pagamentoAtual || $pagamentoAtual['status'] === 'pending'),
        'dias_restantes' => $diasRestantes > 0 ? $diasRestantes : 0
    ];
    
    // Busca empréstimo ativo (pendente)
    $sql = "SELECT 
                amount,
                total_amount,
                due_date
            FROM loans 
            WHERE member_id = ? 
            AND status = 'pending' 
            ORDER BY loan_date DESC 
            LIMIT 1";
            
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $memberId);
    $stmt->execute();
    $result = $stmt->get_result();
    $loanData = $result->fetch_assoc();
    
    $data['loan'] = $loanData ? [
        'valor' => $loanData['total_amount'],
        'vencimento' => $loanData['due_date']
    ] : null;
    
    // Busca histórico de pagamentos
    $sql = "SELECT 
                CONCAT(payment_month, '/', payment_year) as mes_ano,
                amount as valor,
                status,
                payment_date as data_pagamento
            FROM payments 
            WHERE member_id = ? 
            ORDER BY payment_year DESC, payment_month DESC 
            LIMIT 10";
            
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $memberId);
    $stmt->execute();
    $result = $stmt->get_result();
    
    $data['payments'] = [];
    while ($row = $result->fetch_assoc()) {
        $data['payments'][] = $row;
    }
    
    // Busca histórico de rifas
    $sql = "SELECT 
                r.draw_date as data_sorteio,
                r.prize_description as premio,
                r.winning_number as numero_sorteado,
                m.name as ganhador
            FROM raffles r
            LEFT JOIN members m ON m.id = r.winner_id
            WHERE r.status != 'open'
            ORDER BY r.draw_date DESC 
            LIMIT 10";
            
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    
    $data['raffles'] = [];
    while ($row = $result->fetch_assoc()) {
        $data['raffles'][] = $row;
    }
    
    $stmt->close();
    $conn->close();
    
    return $data;
}
