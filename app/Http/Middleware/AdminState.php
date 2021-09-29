<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminState
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            //check admin state
            if (Auth::user()->id_role == 0) {
                return $next($request);
            } else {
                // if don't have state
                return abort(403);
            }
        }
        return redirect('/admin/login');
    }
}