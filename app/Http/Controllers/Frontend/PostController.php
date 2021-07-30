<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index()
    {
        $posts = DB::table('posts')->select('*')->paginate(2);
        $categories = DB::table('categories')->select('*')->get();
        return view("frontend.post.index", compact('posts','categories'));

    }
    public function show($id)
    {
        $posts = DB::table('posts')->where('id','=',$id)->get();
        $comments = DB::table('comments')->where('id_post','=',$id)->get();
        return view("frontend.post.detail",compact('posts','comments'));
    }
    public function byCategory($name)
    {
        $posts = DB::table('posts')->where('category','=',$name)->paginate(2);
        $categories = DB::table('categories')->select('*')->get();
        return view("frontend.post.index",compact('posts','categories'));
    }
}
