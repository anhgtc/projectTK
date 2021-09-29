<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
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
        $users->id_role = '1';

        $users->save();
        return 'done';
    }

    public function login(Request $request)
    {
    }
}