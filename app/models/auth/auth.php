<?php
// app/models/auth/auth.php

require_once "app/config/database.php";

function authenticateUser($cpf, $password) {
    $conn = connectDb();
    
    if (!$conn) {
        return false;
    }
    
    $sql = "SELECT id, name, cpf, member_code, pix_key, password, is_admin 
            FROM members 
            WHERE cpf = ?";
            
    $stmt = $conn->prepare($sql);
    
    if (!$stmt) {
        $conn->close();
        return false;
    }
    
    $stmt->bind_param('s', $cpf);
    $stmt->execute();
    $result = $stmt->get_result();
    $member = $result->fetch_assoc();
    
    $stmt->close();
    $conn->close();
    
    if ($member && password_verify($password, $member['password'])) {
        unset($member['password']);
        return $member;
    }
    
    return false;
}
