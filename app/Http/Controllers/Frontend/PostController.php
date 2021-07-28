<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index()
    {
        $posts = DB::table('posts')->select('*')->paginate(2);
        $categories = DB::table('categories')->select('*')->paginate(2);
        return view("frontend.post.index", compact('posts','categories'));

    }
}
