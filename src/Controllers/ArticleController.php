<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Models\Article;

final class ArticleController extends BaseController
{
    public function show(int $id): void
    {
        $article = Article::find($id);
        if ($article === null) {
            http_response_code(404);
            echo 'Статья не найдена';
            return;
        }

        Article::incrementViews($id);
        $article['views'] = (int) $article['views'] + 1;

        $categories = Article::categoriesOf($id);
        $similar = Article::similar($id, 3);

        $this->render('article.tpl', [
            'article' => $article,
            'categories' => $categories,
            'similar' => $similar,
            'page_title' => $article['title'],
        ]);
    }
}
