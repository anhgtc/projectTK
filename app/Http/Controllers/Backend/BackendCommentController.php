<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BackendCommentController extends Controller
{
    public function index($post_id)
    {
        $comments = DB::table('comments')->where('id_post','=',$post_id)->paginate(2);

        return view("backend.comment.index", compact('comments'));
    }
    public function destroy($id)
    {
        DB::table('comments')->where('id', '=', $id)->delete();
        return redirect()->action([BackendCommentController::class, 'index']);
    }
}
