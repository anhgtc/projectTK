<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;

class BackendCommentController extends Controller
{
    public function index()
    {
        $comments = Comment::select('*')->get();
        $data = [
            'comments' => $comments
        ];
        return response()->json($data);
    }

    public function delete($id)
    {
        Comment::where('id', '=', $id)->delete();
        return 'done';
    }
}