<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::select('*')->get();
        $categories = Category::select('*')->get();
        $data = [
            'categories' => $categories,
            'posts' => $posts
        ];
        return response()->json($data);
    }

    public function show($id)
    {
        $post = Post::where('id', '=', $id)->first();
        $comments = Comment::where('id_post', '=', $id)->get();
        $data = [
            'post' => $post,
            'comments' => $comments
        ];
        return response()->json($data);
    }

    public function find($name)
    {
        $post = Post::where('category', '=', $name)->get();
        $data = [
            'post' => $post,
        ];
        return response()->json($data);
    }
}