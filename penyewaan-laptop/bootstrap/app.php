<?php

use App\Http\Middleware\userLoggedIn;
use App\Http\Middleware\adminLoggedIn;
use Illuminate\Foundation\Application;
use App\Http\Middleware\UserMiddleware;
use App\Http\Middleware\AdminMIddleware;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'admin' => AdminMIddleware::class,
            'user' => UserMiddleware::class,
            "adminLoggedIn" => adminLoggedIn::class,
            "userLoggedIn" => userLoggedIn::class

        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
