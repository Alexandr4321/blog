<?php

declare(strict_types=1);

return [
    'host' => getenv('DB_HOST') ?: '127.0.0.1',
    'port' => getenv('DB_PORT') ?: '3306',
    'dbname' => getenv('DB_NAME') ?: 'blog',
    'user' => getenv('DB_USER') ?: 'blog',
    'password' => getenv('DB_PASSWORD') ?: 'blog',
    'charset' => 'utf8mb4',
];
