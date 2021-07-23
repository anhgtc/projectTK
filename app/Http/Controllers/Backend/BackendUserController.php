<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class BackendUserController extends Controller
{
    public function index()
    {
        return view('backend.user.index');
    }
    public function create()
    {
        return view('backend.user.create');
    }
    public function store(Request $request)
    {
        $users = new User;
        $users->name = $request->name;
        $users->email = $request->email;
        $users->username = $request->username;
        $users->password = $request->password;

        $users->save();
        return redirect()->action([BackendUserController::class, 'create']);
    }
    public function edit()
    {
        return view('backend.user.edit');
    }
}
