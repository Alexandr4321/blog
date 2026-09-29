<?php

declare(strict_types=1);

namespace App\Models;

use App\Database;
use PDO;

final class Article
{
    public static function latestByCategory(int $categoryId, int $limit = 3): array
    {
        $pdo = Database::connection();
        $stmt = $pdo->prepare('
            SELECT a.id, a.title, a.description, a.image, a.views, a.created_at
            FROM articles a
            INNER JOIN article_category ac ON ac.article_id = a.id
            WHERE ac.category_id = ?
            ORDER BY a.created_at DESC
            LIMIT ?
        ');
        $stmt->bindValue(1, $categoryId, PDO::PARAM_INT);
        $stmt->bindValue(2, $limit, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public static function find(int $id): ?array
    {
        $pdo = Database::connection();
        $stmt = $pdo->prepare('SELECT * FROM articles WHERE id = ?');
        $stmt->execute([$id]);
        $row = $stmt->fetch();

        return $row ?: null;
    }

    public static function categoriesOf(int $articleId): array
    {
        $pdo = Database::connection();
        $stmt = $pdo->prepare('
            SELECT c.id, c.name
            FROM categories c
            INNER JOIN article_category ac ON ac.category_id = c.id
            WHERE ac.article_id = ?
            ORDER BY c.name
        ');
        $stmt->execute([$articleId]);

        return $stmt->fetchAll();
    }

    public static function paginateByCategory(
        int $categoryId,
        string $sort = 'date',
        int $page = 1,
        int $perPage = 6
    ): array {
        $pdo = Database::connection();
        $order = $sort === 'views' ? 'a.views DESC' : 'a.created_at DESC';
        $offset = max(0, ($page - 1) * $perPage);

        $countStmt = $pdo->prepare('
            SELECT COUNT(*) FROM articles a
            INNER JOIN article_category ac ON ac.article_id = a.id
            WHERE ac.category_id = ?
        ');
        $countStmt->execute([$categoryId]);
        $total = (int) $countStmt->fetchColumn();

        $stmt = $pdo->prepare("
            SELECT a.id, a.title, a.description, a.image, a.views, a.created_at
            FROM articles a
            INNER JOIN article_category ac ON ac.article_id = a.id
            WHERE ac.category_id = ?
            ORDER BY {$order}
            LIMIT ? OFFSET ?
        ");
        $stmt->bindValue(1, $categoryId, PDO::PARAM_INT);
        $stmt->bindValue(2, $perPage, PDO::PARAM_INT);
        $stmt->bindValue(3, $offset, PDO::PARAM_INT);
        $stmt->execute();

        return [
            'items' => $stmt->fetchAll(),
            'total' => $total,
            'page' => $page,
            'per_page' => $perPage,
            'total_pages' => (int) ceil($total / $perPage),
        ];
    }

    public static function similar(int $articleId, int $limit = 3): array
    {
        $pdo = Database::connection();
        $stmt = $pdo->prepare('
            SELECT a.id, a.title, a.description, a.image, a.views, a.created_at,
                   COUNT(ac2.category_id) AS common_categories
            FROM articles a
            INNER JOIN article_category ac2 ON ac2.article_id = a.id
            WHERE ac2.category_id IN (
                SELECT category_id FROM article_category WHERE article_id = ?
            )
            AND a.id != ?
            GROUP BY a.id
            ORDER BY common_categories DESC, a.created_at DESC
            LIMIT ?
        ');
        $stmt->bindValue(1, $articleId, PDO::PARAM_INT);
        $stmt->bindValue(2, $articleId, PDO::PARAM_INT);
        $stmt->bindValue(3, $limit, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public static function incrementViews(int $id): void
    {
        $pdo = Database::connection();
        $stmt = $pdo->prepare('UPDATE articles SET views = views + 1 WHERE id = ?');
        $stmt->execute([$id]);
    }

    public static function create(
        string $title,
        ?string $description,
        string $body,
        ?string $image,
        array $categoryIds
    ): int {
        $pdo = Database::connection();
        $pdo->beginTransaction();

        try {
            $stmt = $pdo->prepare('
                INSERT INTO articles (title, description, body, image)
                VALUES (?, ?, ?, ?)
            ');
            $stmt->execute([$title, $description, $body, $image]);
            $articleId = (int) $pdo->lastInsertId();

            $link = $pdo->prepare('INSERT INTO article_category (article_id, category_id) VALUES (?, ?)');
            foreach ($categoryIds as $catId) {
                $link->execute([$articleId, (int) $catId]);
            }

            $pdo->commit();
            return $articleId;
        } catch (\Throwable $e) {
            $pdo->rollBack();
            throw $e;
        }
    }
}
