<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class BackendPostController extends Controller
{
    public function index()
    {
        $posts = DB::table('posts')->select('*');
        $posts = $posts->paginate(2);

        return view("backend.post.index", compact('posts'));
    }

    public function create()
    {
        $categories = DB::table('categories')->select('*');
        $categories = $categories->get();
        return view('backend.post.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $posts = new Post;
        $posts->category = $request->category;
        $posts->name = $request->name;
        $posts->content = $request->content;

        $posts->save();
        return redirect()->action([BackendPostController::class, 'create']);
    }

    public function edit($id)
    {
        $post = DB::table('posts')->where('id','=',$id)->get();
        return view('backend.post.edit',compact('post'));
    }

    public function update($id, Request $request)
    {
        $post = new Post;
        $post->name = $request->name;
        $post->content = $request->content;
        DB::table('posts')->where('id','=',$id)->update(['name'=>$post->name,'content'=>$post->content]);
        return redirect()->action([BackendPostController::class, 'index']);
    }

    public function destroy($id)
    {
        DB::table('comments')->where('id_post','=',$id)->delete();
        DB::table('posts')->where('id', '=', $id)->delete();
        return redirect()->action([BackendPostController::class, 'index']);
    }
}
