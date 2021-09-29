<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class BackendAdminController extends Controller
{
    public function register(Request $request)
    {
        $user = DB::table('users')->where('email', '=', $request->email)->first();
        if (!empty($user)) return response()->json([
            'errors' => [
                'email' => ['Email da ton tai']
            ],
            'message' => 'The given data was invalid.'
        ], 422);
        $user = DB::table('users')->where('username', '=', $request->username)->first();
        if (!empty($user)) return response()->json([
            'errors' => [
                'usrename' => ['Username da ton tai']
            ],
            'message' => 'The given data was invalid.'
        ], 422);
        $users = new User;
        $users->name = $request->name;
        $users->email = $request->email;
        $users->username = $request->username;
        $users->password = Hash::make($request->password);
        $users->id_role = '0';

        $users->save();
        return 'done';
    }

    public function index()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            $user = User::where('username', '=', $request->username)->first();
            Auth::login($user);
            return redirect('/admin');
        }
        $request->session()->flash('status', 'Đăng nhập thất bại!');
        return redirect('/admin/login');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return response()->json([
            'message' => 'Logout succcess',
        ], 200);
    }
}