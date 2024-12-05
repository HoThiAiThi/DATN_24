<?php

namespace App\Page;

use App\Models\Phong;
use App\Service\ArticleService;
use Illuminate\Http\Request;

class PageBlogService
{
    public static function index(Request $request)
    {
        $articles = ArticleService::getListsArticles($request, []);

        $viewData = [
            'articles' => $articles
        ];

        return $viewData;
    }

    public static function getArticleDetail($id, Request $request)
    {
        $article  = Phong::find($id);

        $viewData = [
            'article' => $article
        ];

        return $viewData;
    }
}
