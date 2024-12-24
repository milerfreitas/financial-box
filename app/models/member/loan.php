<?php
// app/models/member/loan.php
require_once 'app/config/database.php';
require_once 'app/helpers/telegram.php';

function requestLoan($memberId, $amount) {
    $conn = connectDb();
    
    if (!$conn) {
        return ['success' => false, 'error' => 'Erro de conexão com o banco'];
    }
    
    try {
        // Inicia a transação
        $conn->begin_transaction();
        
        // Verifica se o membro já tem empréstimo ativo
        $sql = "SELECT id FROM loans WHERE member_id = ? AND status != 'paid'";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $memberId);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            throw new Exception("Você já possui um empréstimo ativo.");
        }
        
        // Busca dados do membro
        $sql = "SELECT name, pix_key FROM members WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $memberId);
        $stmt->execute();
        $memberData = $stmt->get_result()->fetch_assoc();
        
        // Calcula juros e valor total
        $interestRate = 20; // 20%
        $loanDate = date('Y-m-d');
        $dueDate = date('Y-m-d', strtotime($loanDate . ' +31 days')); // 31 dias após a solicitação
        $status = 'pending';
                
        // Insere o empréstimo
        $sql = "INSERT INTO loans (member_id, amount, interest_rate, loan_date, due_date, status) 
                VALUES (?, ?, ?, ?, ?, ?)";
                
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("idssss", 
            $memberId, 
            $amount, 
            $interestRate, 
            $loanDate, 
            $dueDate, 
            $status
        );
        
        if (!$stmt->execute()) {
            throw new Exception("Erro ao registrar empréstimo: " . $stmt->error);
        }
        
        $loanId = $conn->insert_id;
        
        // Registra a transação
        $transactionSql = "INSERT INTO transactions (amount, description, reference_id, type) 
                          VALUES (?, ?, ?, 'loan')";
                          
        $desc = "Empréstimo solicitado";
        
        $stmt = $conn->prepare($transactionSql);
        $stmt->bind_param("dsi", $amount, $desc, $loanId);
        
        if (!$stmt->execute()) {
            throw new Exception("Erro ao registrar transação: " . $stmt->error);
        }
        
        // Envia notificação para o Telegram
        $message = "📝 <b>Novo Pedido de Empréstimo</b>\n\n"
                . "Nome: {$memberData['name']}\n"
                . "Valor: R$ " . number_format($amount, 2, ',', '.') . "\n"
                . "Chave PIX: {$memberData['pix_key']}\n"
                . "Data da Solicitação: Pedido feito em " . date('d/m/y') . " às " . date('H\hi') . "\n"
                . "#pedidoEmprestimo";
        
        sendToTelegram($message);
        
        // Finaliza a transação
        $conn->commit();
        
        return [
            'success' => true, 
            'message' => 'Empréstimo solicitado com sucesso!'
        ];
        
    } catch (Exception $e) {
        $conn->rollback();
        return [
            'success' => false, 
            'error' => $e->getMessage()
        ];
    } finally {
        $conn->close();
    }
}
