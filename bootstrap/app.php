<?php

use App\Http\Middleware\SetLang;
use App\Http\Middleware\SetLocale;
use App\Http\Middleware\UserAuth;
use App\Http\Middleware\AdminOnly;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // ✅ Global middleware for web group
        $middleware->web(append: [
            SetLocale::class,
            SetLang::class,
        ]);

        // ✅ Register route middleware (aliases)
        $middleware->alias([
            'user.auth' => UserAuth::class,
            'admin.only' => AdminOnly::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })
    ->create();
