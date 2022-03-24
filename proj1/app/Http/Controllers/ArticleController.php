<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Intro;
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

    public function deleteById($id)
    {
//        Article::destroy([$id]);
        Article::find($id)->delete();
        return $id . ' item deleted';
    }

    public function trashList()
    {
        $res = 'trashed articles: <br>';
        $arts = Article::onlyTrashed()->where('id', '>', 0)->get();

        foreach ($arts as $article) {
            $res .= $article->id . ' <a href="' . route('view_article_by_id', ['id' => $article->id]) . '">' . $article->title . '</a><br>';
        }
        return $res;
    }

    public function list()
    {
        $res = '<pre>articles: <br>';
        $arts = (new Article)->where('id', '>', 0)->get();
//        $arts = Article::withTrashed()->where('id', '>', 0)->get();
        foreach ($arts as $article) {
            $res .= $article->id . ' <a href="' . route('view_article_by_id', ['id' => $article->id]) . '">' . $article->title . '</a> intro: ' . ($article->intro ? $article->intro->description : '') . '<br>';
            foreach ($article->attachments as $attachment) {
                $res .= "\t" . $attachment->name . ' ' . $attachment->url . '<br>';
            }
        }
        $res .= '</pre>';
        return $res;
    }

    public function getIntros()
    {
        $res = 'intros: <br>';
        $intros = (new Intro)->where('id', '>', 0)->get();
        foreach ($intros as $intro) {
            $res .= 'desc: ' . $intro->description . ' article: ' . ($intro->article ? $intro->article->title : '') . '<br>';
        }
        return $res;
    }
}
