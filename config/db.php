<?php

$connectionUrl = getenv('DATABASE_URL') ?: getenv('DB_DSN');
$username = getenv('DB_USER') ?: 'postgres';
$password = getenv('DB_PASSWORD') ?: '';

$ensureNeonEndpoint = function ($dsn) {
    if (stripos($dsn, 'pgsql:') !== 0) {
        return $dsn;
    }

    $dsnParts = explode(';', substr($dsn, 6));
    $parameters = [];
    foreach ($dsnParts as $part) {
        $separator = strpos($part, '=');
        if ($separator !== false) {
            $parameters[strtolower(trim(substr($part, 0, $separator)))] = trim(substr($part, $separator + 1));
        }
    }

    $host = $parameters['host'] ?? '';
    if (!preg_match('/\.neon\.tech$/i', $host)) {
        return $dsn;
    }

    $endpointId = explode('.', $host, 2)[0];
    $endpointId = preg_replace('/-pooler$/i', '', $endpointId);
    if (!preg_match('/^ep-[a-z0-9-]+$/i', $endpointId)) {
        throw new \InvalidArgumentException('Không thể suy ra endpoint ID từ hostname Neon.');
    }

    $optionsFound = false;
    foreach ($dsnParts as &$part) {
        if (stripos($part, 'options=') !== 0) {
            continue;
        }

        $optionsFound = true;
        $options = rawurldecode(substr($part, strlen('options=')));
        if (!preg_match('/(?:^|\s)endpoint=/i', $options)) {
            $options = 'endpoint=' . $endpointId . ($options !== '' ? ' ' . $options : '');
        }
        $part = 'options=' . $options;
    }
    unset($part);

    if (!$optionsFound) {
        $dsnParts[] = 'options=endpoint=' . $endpointId;
    }

    return 'pgsql:' . implode(';', $dsnParts);
};

if ($connectionUrl && preg_match('/^postgres(?:ql)?:\/\//i', $connectionUrl)) {
    $parsed = parse_url($connectionUrl);
    if ($parsed === false || empty($parsed['host']) || empty($parsed['path'])) {
        throw new \InvalidArgumentException('DATABASE_URL không hợp lệ.');
    }

    $query = [];
    parse_str($parsed['query'] ?? '', $query);

    $dsnParts = [
        'host=' . $parsed['host'],
        'port=' . ($parsed['port'] ?? 5432),
        'dbname=' . rawurldecode(ltrim($parsed['path'], '/')),
        'sslmode=' . ($query['sslmode'] ?? 'require'),
    ];
    if (isset($query['channel_binding'])) {
        $dsnParts[] = 'channel_binding=' . $query['channel_binding'];
    }
    if (isset($query['options']) && $query['options'] !== '') {
        $dsnParts[] = 'options=' . $query['options'];
    }

    $dsn = 'pgsql:' . implode(';', $dsnParts);
    $username = rawurldecode($parsed['user'] ?? $username);
    $password = rawurldecode($parsed['pass'] ?? $password);
} else {
    $dsn = $connectionUrl ?: 'pgsql:host=localhost;port=5432;dbname=dulieu-cauonglanh';
}
$dsn = $ensureNeonEndpoint($dsn);

return [
    'class' => 'yii\db\Connection',
    'dsn' => $dsn,
    'username' => $username,
    'password' => $password,
    'charset' => 'utf8',
];
