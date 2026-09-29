<?php

declare(strict_types=1);

namespace App\Models;

use App\Database;
use PDO;

final class Category
{
    public static function allWithArticles(): array
    {
        $pdo = Database::connection();

        $sql = '
            SELECT c.id, c.name, c.description
            FROM categories c
            WHERE EXISTS (
                SELECT 1 FROM article_category ac WHERE ac.category_id = c.id
            )
            ORDER BY c.name
        ';

        return $pdo->query($sql)->fetchAll();
    }

    public static function find(int $id): ?array
    {
        $pdo = Database::connection();
        $stmt = $pdo->prepare('SELECT * FROM categories WHERE id = ?');
        $stmt->execute([$id]);
        $row = $stmt->fetch();

        return $row ?: null;
    }

    public static function create(string $name, ?string $description = null): int
    {
        $pdo = Database::connection();
        $stmt = $pdo->prepare('INSERT INTO categories (name, description) VALUES (?, ?)');
        $stmt->execute([$name, $description]);
        return (int) $pdo->lastInsertId();
    }
}
