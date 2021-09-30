<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class BackendPostController extends Controller
{
    public function index()
    {
        $posts = Post::select('*')->get();
        $data = [
            'posts' => $posts
        ];
        return response()->json($data);
    }

    public function show($id)
    {
        $post = Post::where('id', '=', $id)->first();
        $data = [
            'post' => $post
        ];
        return response()->json($data);
    }

    public function update($id, Request $request)
    {
        $post = new Post;
        $post->name = $request->name;
        $post->content = $request->content;
        Post::where('id', '=', $id)->update(['name' => $post->name, 'content' => $post->content]);
        return 'done';
    }

    public function viewCreate()
    {
        $categories = Category::select('*')->get();
        $data = [
            'categories' => $categories
        ];
        return response()->json($data);
    }
    public function create(Request $request)
    {
        $post = new Post;
        $post->name = $request->name;
        $post->category = $request->category;
        $post->content = $request->content;

        $post->save();
        return 'done';
    }



    public function delete($id)
    {
        DB::table('comments')->where('id_post', '=', $id)->delete();
        DB::table('posts')->where('id', '=', $id)->delete();
        return 'done';
    }
}