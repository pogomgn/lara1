<?php

namespace App\Http\Controllers;

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
        return 'haha';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return 'create';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $r = new Response();
        $r->setStatusCode(500);
        return $r;
        return 'id: ' . $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
