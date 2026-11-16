<?php

return [
    // 'class' => \yii\db\Connection::class,
    // 'dsn' => 'pgsql:host=localhost;port=5432;dbname=dulieu-cauonglanh',
    // 'username' => 'postgres',
    // 'password' => '',
    // 'charset' => 'utf8',

    'class' => 'yii\db\Connection',
    // Dòng này giúp chạy được cả local lẫn trên cloud mà không cần sửa code lại mỗi lần deploy
    'dsn' => getenv('DATABASE_URL') ?: 'pgsql:host=localhost;port=5432;dbname=dulieu-cauonglanh',
    'username' => getenv('DB_USER') ?: 'postgres',
    'password' => getenv('DB_PASSWORD') ?: '',
    'charset' => 'utf8',

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
