<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class BackendUserController extends Controller
{
    public function index()
    {
        $users = User::select('*')->get();
        $data = [
            'users' => $users
        ];
        return response()->json($data);
    }

    public function show($id)
    {
        $user = User::where('id', '=', $id)->first();
        $data = [
            'user' => $user
        ];
        return response()->json($data);
    }

    public function update($id, Request $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->password = Hash::make($request->password);
        User::where('id', '=', $id)->update(['name' => $user->name, 'password' => $user->password]);
        return 'done';
    }

    public function create(Request $request)
    {
        $user = User::where('email', '=', $request->email)->first();
        if (!empty($user)) return response()->json([
            'errors' => [
                'email' => ['Email da ton tai']
            ],
            'message' => 'The given data was invalid.'
        ], 422);
        $user = User::where('username', '=', $request->username)->first();
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



    public function delete($id)
    {
        Comment::where('id_user', '=', $id)->delete();
        User::where('id', '=', $id)->delete();
        return 'done';
    }
}