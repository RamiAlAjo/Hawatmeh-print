<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

use App\Http\Middleware\SetLocale;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // ✅ Only middleware safe for global usage
        $middleware->append(SetLocale::class);

        // ❌ Do NOT register session-dependent middleware globally
        // $middleware->append(TrackUniqueVisitor::class);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        // Handle exceptions here
    })
    ->create();
