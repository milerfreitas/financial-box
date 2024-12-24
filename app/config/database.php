<?php
// app/config/database.php
require_once __DIR__ . '/../helpers/config.php';

function connectDb() {
    $config = getConfig('db');
    
    try {
        $conn = new mysqli(
            $config['host'],
            $config['user'],
            $config['pass'],
            $config['name']
        );
        
        if ($conn->connect_error) {
            throw new Exception("Erro na conexão: " . $conn->connect_error);
        }
        
        $conn->set_charset("utf8mb4");
        return $conn;
        
    } catch (Exception $e) {
        error_log("Erro na conexão com o banco: " . $e->getMessage());
        return false;
    }
}