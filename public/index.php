<?php

declare(strict_types=1);

spl_autoload_register(function (string $class): void {
    if (str_starts_with($class, 'App\\')) {
        $path = __DIR__ . '/../src/' . str_replace('\\', '/', substr($class, 4)) . '.php';
        if (is_file($path)) {
            require $path;
        }
        return;
    }
});

if (is_file(__DIR__ . '/../vendor/autoload.php')) {
    require __DIR__ . '/../vendor/autoload.php';
} elseif (is_file(__DIR__ . '/../smarty-4.5.7/libs/Smarty.class.php')) {
    require_once __DIR__ . '/../smarty-4.5.7/libs/Smarty.class.php';
} elseif (is_file(__DIR__ . '/../vendor/smarty-php/libs/Smarty.class.php')) {
    require_once __DIR__ . '/../vendor/smarty-php/libs/Smarty.class.php';
} else {
    fwrite(STDERR, "Smarty not found. Run: composer install\n");
    exit(1);
}

require_once __DIR__ . '/../src/helpers.php';

use App\Router;
use App\Controllers\HomeController;

$dirs = [
    __DIR__ . '/../var/smarty/compile',
    __DIR__ . '/../var/smarty/cache',
    __DIR__ . '/../var/smarty/configs',
];
foreach ($dirs as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0775, true);
    }
}

$router = new Router();
$router->get('/', [HomeController::class, 'index']);
$router->dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI'] ?? '/');
