<?php
// app/config/config.php
return [
    'db' => [
        'host' => 'localhost',
        'name' => 'caixinha',
        'user' => 'root',
        'pass' => 'pqd67688'
    ],
    'telegram' => [
        'token' => '{TOKEN-AQUI}',
        'chat_id' => '{CHAT-ID-AQUI}'
    ],
    'security' => [
        'session_timeout' => 3600, // 1 hora
        'max_login_attempts' => 5,
        'lockout_time' => 1800,  // 30 minutos
        'password_min_length' => 6,
        'csrf_token_time' => 3600
    ]
];