<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function add($title, $content)
    {
        $article = new Article();
        $article->title = $title;
        $article->content = $content;
        $article->save();
        return 'article ' . $article->id . ' added';
    }

    public function getByTitle($title)
    {
        $articles = Article::where('title', $title)->orderBy('id', 'desc')->get();
        $res = 'Founded articles: <br>';
        foreach ($articles as $article) {
            $res .= $article->id . ' <a href="' . route('view_article_by_id', ['id' => $article->id]) . '">' . $article->title . '</a><br>';
        }
        return $res;

    }

    public function getById($id)
    {
//        Article::findOrFail()
        $article = Article::find($id);
        return $article->id . ' ' . $article->title . ' ' . $article->content . '<br>';
    }

    public function list()
    {
        $res = 'articles: <br>';
        $arts = Article::all();
        foreach ($arts as $article) {
            $res .= $article->id . ' <a href="' . route('view_article_by_id', ['id' => $article->id]) . '">' . $article->title . '</a><br>';
        }
        return $res;
    }
}
