<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    protected $middleware = [
        // Middleware global
        // \App\Http\Middleware\TrustProxies::class,
        // \App\Http\Middleware\PreventRequestsDuringMaintenance::class,
        \Illuminate\Routing\Middleware\SubstituteBindings::class,
        // Middleware lainnya...
    ];

   protected $middlewareGroups = [
    'api' => [
        \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
        'throttle:api',
        \Illuminate\Routing\Middleware\SubstituteBindings::class,
        \App\Http\Middleware\VerifyCsrfToken::class, // Hapus atau komentar baris ini
    ],
];


    protected $routeMiddleware = [
        // Middleware yang terdaftar di sini
        'checkApiToken' => \App\Http\Middleware\CheckApiToken::class,
        // Middleware lainnya...
    ];
}
