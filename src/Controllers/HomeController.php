<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\Article;
use App\Models\Category;

final class HomeController extends BaseController
{
    public function index(): void
    {
        $categories = Category::allWithArticles();
        $sections = [];

        foreach ($categories as $category) {
            $sections[] = [
                'category' => $category,
                'articles' => Article::latestByCategory((int) $category['id'], 3),
            ];
        }

        $this->render('home.tpl', [
            'sections' => $sections,
            'page_title' => 'Главная',
        ]);
    }
}
