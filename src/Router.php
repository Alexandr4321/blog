<?php

declare(strict_types=1);

namespace App;

final class Router
{
    /** @var array<string, array{0: class-string, 1: string}> */
    private array $routes = [];

    public function get(string $path, array $handler): void
    {
        $this->routes['GET'][$this->normalize($path)] = $handler;
    }

    public function dispatch(string $method, string $uri): void
    {
        $path = parse_url($uri, PHP_URL_PATH) ?: '/';
        $path = $this->normalize($path);

        $handler = $this->routes[$method][$path] ?? null;

        if ($handler === null) {
            $handler = $this->matchDynamic($method, $path);
        }

        if ($handler === null) {
            http_response_code(404);
            echo '404 Not Found';
            return;
        }

        [$class, $action, $params] = $handler + [2 => []];
        $controller = new $class();
        $controller->$action(...$params);
    }

    private function matchDynamic(string $method, string $path): ?array
    {
        if ($method !== 'GET') {
            return null;
        }

        if (preg_match('#^/category/(\d+)$#', $path, $m)) {
            return [\App\Controllers\CategoryController::class, 'show', [(int) $m[1]]];
        }

        if (preg_match('#^/article/(\d+)$#', $path, $m)) {
            return [\App\Controllers\ArticleController::class, 'show', [(int) $m[1]]];
        }

        return null;
    }

    private function normalize(string $path): string
    {
        $path = '/' . trim($path, '/');
        return $path === '/' ? '/' : rtrim($path, '/');
    }
}
