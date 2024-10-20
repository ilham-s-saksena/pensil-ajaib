<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * @var array
     */
    protected $middleware = [
        // \App\Http\Middleware\TrustProxies::class,
        // \App\Http\Middleware\CheckForMaintenanceMode::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        // \App\Http\Middleware\TrimStrings::class,
        \Illuminate\Routing\Middleware\SubstituteBindings::class,
    ];

    /**
     * The application's route middleware.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        'bindings' => \Illuminate\Routing\Middleware\SubstituteBindings::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        // Anda bisa menambahkan middleware lain di sini
    ];

    /**
     * The middleware groups for the application.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            // Middleware lainnya...
            // \App\Http\Middleware\VerifyCsrfToken::class, // Middleware CSRF dinonaktifkan
        ],

        'api' => [
            'throttle:api',
            'bindings',
        ],
    ];
}
