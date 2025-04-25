<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class userAuth
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->session()->get('id')) {
            return redirect('/login');
        }
        return $next($request);
    }
}
