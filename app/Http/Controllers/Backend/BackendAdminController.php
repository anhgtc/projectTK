<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Backend\BackendHomeController;
class BackendAdminController extends Controller
{
    public function viewLogin()
    {
        return view('backend.admin.login');
    }
    public function login(Request $request)
    {
        if($request->username=='admin' && $request->password=='12345678')
            return redirect()->action([BackendHomeController::class, 'index']);
    }
    public function logout()
    {
        return view('backend.admin.login');
    }
}
