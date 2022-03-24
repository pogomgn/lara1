<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/posts/', [PostController::class, 'index']);
//Route::get('/posts/{id}/', [PostController::class, 'show']);
//Route::resource('posts', PostController::class);
//Route::get('/posts/add/', [PostController::class, 'add']);
Route::get('/posts/add/{id}', [PostController::class, 'add']);
Route::get('/posts/list/', [PostController::class, 'list']);
Route::get('/app1/', [PostController::class, 'app1']);


Route::get('/article/', [ArticleController::class, 'list']);
Route::get('/article/trash', [ArticleController::class, 'trashList']);
Route::get('/article/titlefind/{title}', [ArticleController::class, 'getByTitle']);
Route::get('/article/{id}', [ArticleController::class, 'getById'])->name('view_article_by_id');
Route::get('/article/add/{title}/{content}', [ArticleController::class, 'add']);
Route::get('/article/delete/{id}', [ArticleController::class, 'deleteById']);
Route::get('/article/softdelete/{id}', [ArticleController::class, 'softDeleteById']);

Route::get('/intros/', [ArticleController::class, 'getIntros']);


//Route::get('/api/{func}', function ($func) {
//    return 'function name == ' . $func;
//});
//
//Route::get('/test/', function () {
//    return 'haha';//view('test');
//});
//
//Route::get('/tratata/', function(){
//    $url = route('tra');
//    return 'url ' . $url;
//})->name('tra');
