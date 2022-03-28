<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fields = array_merge(['author_id' => 1], $request->all());
//        unset($fields['_token']);
//        return var_export($fields, true);
//        !$fields['author_id'] && $fields['author_id'] = 1;
//        var_export($fields);
        Post::create($fields);
//        return $request->all();
        return redirect('/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = (new \App\Models\Post)->where('id', $id)->first();
        return view('posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = (new \App\Models\Post)->where('id', $id)->first();
        return view('posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $fields = $request->all();
        $post = (new \App\Models\Post)->where('id', $id)->first();
        $post->update($fields);
        return redirect(route('posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = (new \App\Models\Post)->where('id', $id)->first();
        $post->delete();
        return redirect(route('posts.index'));
    }

    public function add($id = 0)
    {
        DB::insert('insert into posts (title, content, url, author_id) values (?, ?, ?, ?);', ["$id title", "content", "url", 1]);
        return view('addpost', ['id' => $id]); // or
//        return view('addpost')->with('id', $id);
    }

    public function list()
    {
        $out = '<pre>';
        $result = DB::select('select * from posts where id > 0;');
        foreach ($result as $item) {
            $out .= $item->id . ' ' . $item->title . "\r\n";
        }
        $out .= '</pre>';
        return $out;
        return '<pre>' . var_export($result, true) . '</pre>';
    }

    public function app1()
    {
        $langs = [
            'ru',
            'en',
            'fr',
        ];
        return view('app1', [
            'lang' => $langs,
        ]);
    }
}
