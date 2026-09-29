<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\Article;
use App\Models\Category;

final class CategoryController extends BaseController
{
    public function show(int $id): void
    {
        $category = Category::find($id);
        if ($category === null) {
            http_response_code(404);
            echo 'Категория не найдена';
            return;
        }

        $app = require __DIR__ . '/../../config/app.php';
        $sort = ($_GET['sort'] ?? 'date') === 'views' ? 'views' : 'date';
        $page = max(1, (int) ($_GET['page'] ?? 1));

        $result = Article::paginateByCategory(
            $id,
            $sort,
            $page,
            (int) $app['per_page']
        );

        $this->render('category.tpl', [
            'category' => $category,
            'articles' => $result['items'],
            'pagination' => [
                'page' => $result['page'],
                'total_pages' => $result['total_pages'],
                'total' => $result['total'],
            ],
            'sort' => $sort,
            'page_title' => $category['name'],
        ]);
    }
}
