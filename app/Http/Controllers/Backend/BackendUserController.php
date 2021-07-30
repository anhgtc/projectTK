<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class BackendUserController extends Controller
{
    public function index()
    {
        $users = DB::table('users')->where('id_role','=','1')->paginate(2);

        return view("backend.user.index", compact('users'));
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
        $users->id_role = '1';

        $users->save();
        return redirect()->action([BackendUserController::class, 'create']);
    }

    public function edit($id)
    {
        $user = DB::table('users')->where('id','=',$id)->get();
        return view('backend.user.edit',compact('user'));
    }

    public function update($id, Request $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->password = $request->password;
        DB::table('users')->where('id','=',$id)->update(['name'=>$user->name,'password'=>$user->password]);
        return redirect()->action([BackendUserController::class, 'index']);
    }

    public function destroy($id)
    {
        DB::table('comments')->where('id_user','=',$id)->delete();
        DB::table('users')->where('id', '=', $id)->delete();
        return redirect()->action([BackendUserController::class, 'index']);
    }
}
