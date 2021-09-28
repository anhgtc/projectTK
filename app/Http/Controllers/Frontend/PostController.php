<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index()
    {
        $posts = DB::table('posts')->select('*')->get();
        $categories = DB::table('categories')->select('*')->get();
        $data = [
            'categories' => $categories,
            'posts' => $posts
        ];
        return response()->json($data);
    }

    public function show($id)
    {
        $post = DB::table('posts')->where('id', '=', $id)->first();
        $comments = DB::table('comments')->where('id_post', '=', $id)->get();
        $data = [
            'post' => $post,
            'comments' => $comments
        ];
        return response()->json($data);
    }

    public function find($name)
    {
        $post = DB::table('posts')->where('category', '=', $name)->get();
        $data = [
            'post' => $post,
        ];
        return response()->json($data);
    }
}