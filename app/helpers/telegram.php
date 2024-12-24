// app/helpers/telegram.php
<?php
require_once __DIR__ . '/config.php';

function sendToTelegram($message) {
    $config = getConfig('telegram');
    
    $data = [
        'chat_id' => $config['chat_id'],
        'text' => $message,
        'parse_mode' => 'HTML'
    ];
    
    $url = "https://api.telegram.org/bot{$config['token']}/sendMessage";
    
    $options = [
        'http' => [
            'method' => 'POST',
            'header' => 'Content-Type: application/x-www-form-urlencoded',
            'content' => http_build_query($data)
        ]
    ];
    
    $context = stream_context_create($options);
    
    try {
        $result = file_get_contents($url, false, $context);
        return $result !== false;
    } catch (Exception $e) {
        error_log('Erro ao enviar mensagem Telegram: ' . $e->getMessage());
        return false;
    }
}