<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;

$app = Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->shouldRenderJsonWhen(
            fn (Request $request) => $request->is('api/*') || $request->expectsJson(),
        );
    })->create();
<<<<<<< HEAD

    if (isset($_ENV['VERCEL']) || isset($_SERVER['VERCEL']) || getenv('VERCEL')) {
=======
if (isset($_ENV['VERCEL']) || isset($_SERVER['VERCEL']) || getenv('VERCEL')) {
>>>>>>> 1e480a77ef6348f16020d680d768bcd0ef564693
    $path = '/tmp/laravel-storage';
    foreach ([
        'framework/views',
        'framework/sessions',
        'framework/cache/data',
        'logs',
    ] as $dir) {
        @mkdir($path.'/'.$dir, 0775, true);
    }
    @mkdir('/tmp/views', 0775, true);
    $app->useStoragePath($path);
}

<<<<<<< HEAD


=======
>>>>>>> 1e480a77ef6348f16020d680d768bcd0ef564693
return $app;
