<?php

$dsn = getenv('DB_DSN') ?: 'pgsql:host=localhost;port=5432;dbname=dulieu-cauonglanh';
$username = getenv('DB_USER') ?: 'postgres';
$password = getenv('DB_PASSWORD') ?: '';

// Tự động bóc tách nếu phát hiện chuỗi URL của Neon (postgresql://...)
if (strpos($dsn, 'postgresql://') === 0 || strpos($dsn, 'postgres://') === 0) {
    $parsed = parse_url($dsn);
    $host = $parsed['host'] ?? 'localhost';
    $port = $parsed['port'] ?? 5432;
    $dbname = ltrim($parsed['path'] ?? '', '/');
    
    if (isset($parsed['user'])) {
        $username = $parsed['user'];
    }
    if (isset($parsed['pass'])) {
        $password = $parsed['pass'];
    }

    $sslmode = 'require';
    if (isset($parsed['query'])) {
        parse_str($parsed['query'], $query);
        if (isset($query['sslmode'])) {
            $sslmode = $query['sslmode'];
        }
    }

    $dsn = "pgsql:host={$host};port={$port};dbname={$dbname};sslmode={$sslmode}";
}

return [
    'class' => 'yii\db\Connection',
    'dsn' => $dsn,
    'username' => $username,
    'password' => $password,
    'charset' => 'utf8',
];