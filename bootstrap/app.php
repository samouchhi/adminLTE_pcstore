<?php

use App\Http\Middleware\AuthAdmin;
use App\Http\Middleware\AuthAdminCheck;
use App\Http\Middleware\checkAuth;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;


return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->appendToGroup('AuthAdmin', [
            AuthAdmin::class,
        ]);
        $middleware->appendToGroup('checkAuth', [
            checkAuth::class,
        ]);


    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
