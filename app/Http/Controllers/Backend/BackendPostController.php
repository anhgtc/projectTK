<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BackendPostController extends Controller
{
    public function index()
    {
        return view('backend.post.index');
    }
    public function create()
    {
        return view('backend.post.create');
    }
}
