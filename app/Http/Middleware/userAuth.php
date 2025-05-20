<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserAuth
{
    public function handle(Request $request, Closure $next)
    {

        if (!Auth::check()) {
            return redirect('/login');
        }
        return $next($request);
    }
}
// if (!$request->session()->get('id')) {
//     return redirect('/login');
// }
