<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, $id)
    {
        $comments = new Comment;
        $comments->id_user = Auth::user()->id;
        $comments->id_post = $id;
        $comments->content = $request->content;
        $comments->username = Auth::user()->username;

        $comments->save();
        return redirect()->route('post.show',$id);

    }
}
