<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Backend\BackendHomeController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BackendAdminController extends Controller
{
    public function viewLogin()
    {
        return view('backend.admin.login');
    }
    public function login(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        $users = User::all();
        foreach ($users as $user) {
            if ($user->username == $username && $user->password == $password && $user->id_role == '0')
            {
                Auth::login($user);
                return redirect()->route('backend.home');
            }
        }
        return view('backend.admin.login');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('backend.home');
    }
    public function register()
    {
        return view('backend.admin.register');
    }
    public function store(Request $request)
    {
        $users = DB::table('users')->select('*')->get();
        foreach ($users as $user) {
            if ($user->username == $request->username || $user->email == $request->email)
                return view ('backend.admin.register');
        }

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->password = $request->password;
        $user->id_role = '0';

        $user->save();
        return view('backend.admin.login');
    }
}
