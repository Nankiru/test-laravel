<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class SetLang
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // if ($request->session()->has('locale')) {
        //     App::setLocale($request->session()->get('locale', 'en'));
        // }
        // return $next($request);
        $locale = $request->session()->get('locale', 'en');

        App::setLocale($locale);

        return $next($request);
    }
}
