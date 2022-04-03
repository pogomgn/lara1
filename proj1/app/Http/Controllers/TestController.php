<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function testAccessor()
    {
        $article = (new Article)->first();
        return $article->title;
    }
}
