<?php
// app/models/member/password.php
require_once "app/config/database.php";

function updatePassword($memberId, $currentPassword, $newPassword) {
    $conn = connectDb();
    
    if (!$conn) {
        return false;
    }
    
    // Primeiro, verifica se a senha atual está correta
    $sql = "SELECT password FROM members WHERE id = ?";
    $stmt = $conn->prepare($sql);
    
    if (!$stmt) {
        $conn->close();
        return false;
    }
    
    $stmt->bind_param('i', $memberId);
    $stmt->execute();
    $result = $stmt->get_result();
    $member = $result->fetch_assoc();
    $stmt->close();
    
    if (!$member || !password_verify($currentPassword, $member['password'])) {
        $conn->close();
        return false;
    }
    
    // Se a senha atual estiver correta, atualiza para a nova senha
    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
    $sql = "UPDATE members SET password = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    
    if (!$stmt) {
        $conn->close();
        return false;
    }
    
    $stmt->bind_param('si', $hashedPassword, $memberId);
    $success = $stmt->execute();
    $stmt->close();
    $conn->close();
    
    return $success;
}