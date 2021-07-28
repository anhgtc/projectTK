<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserController extends Controller
{
    public function login()
    {
        return view ('frontend.user.login');
    }
    public function confirmLogin(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        $users = DB::table('users')->select('*')->get();
        foreach ($users as $user) {
            if ($user->username == $username && $user->password == $password)
                return view ('frontend.home.index');
        }
        return view ('frontend.user.login');
    }
    public function logout()
    {

    }
    public function register()
    {
        return view('frontend.user.register');
    }
    public function confirmRegister(Request $request)
    {
        $users = DB::table('users')->select('*')->get();
        foreach ($users as $user) {
            if ($user->username == $request->username || $user->email == $request->email)
                return view ('frontend.user.register');
        }

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->password = $request->password;

        $user->save();
        return view('frontend.user.login');
    }
}
