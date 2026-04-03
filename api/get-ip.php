<?php
declare(strict_types=1);
header('Content-Type: application/json');

$ip = $_SERVER['HTTP_X_FORWARDED_FOR']
    ?? $_SERVER['HTTP_X_REAL_IP']
    ?? $_SERVER['REMOTE_ADDR']
    ?? 'Desconhecido';

// HTTP_X_FORWARDED_FOR pode conter lista; pegar o primeiro
if (strpos($ip, ',') !== false) {
    $ip = trim(explode(',', $ip)[0]);
}

echo json_encode(['ip' => $ip]);
