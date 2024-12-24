<?php
// app/helpers/config.php
function getConfig($key = null) {
    static $config = null;
    
    if ($config === null) {
        $config = require __DIR__ . '/../config/config.php';
    }
    
    if ($key === null) {
        return $config;
    }
    
    $keys = explode('.', $key);
    $value = $config;
    
    foreach ($keys as $k) {
        if (!isset($value[$k])) {
            return null;
        }
        $value = $value[$k];
    }
    
    return $value;
}