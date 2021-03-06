<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

// Clean
class Kernel extends HttpKernel
{

    protected $bootstrappers = [

        'Illuminate\Foundation\Bootstrap\DetectEnvironment',
        'Illuminate\Foundation\Bootstrap\LoadConfiguration',
        'Illuminate\Foundation\Bootstrap\ConfigureLogging',
        'Illuminate\Foundation\Bootstrap\HandleExceptions',
        'Illuminate\Foundation\Bootstrap\RegisterFacades',
        'Illuminate\Foundation\Bootstrap\RegisterProviders',
        'Illuminate\Foundation\Bootstrap\BootProviders',

        /*
         * Custom
         */
//        'Bootstrap\ConfigureLogging', // custom logger bootstrapper
    ];

    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [

        /*
        * Third party
        */
        \Barryvdh\Cors\HandleCors::class,
        \Barryvdh\Cors\HandlePreflight::class,
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [

        'admin' => [
            'web',
            'auth',
            'users.routeNeedsPermission:view-admin',
            'users.subscriptionSetup',
        ],

        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            'throttle:60,1',
            'bindings',
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [

        /*
        * Subscription
        */
        'users.subscriptionSetup' => \Topicmine\Subscription\Middleware\SubscriptionSetup::class,


        'users.routeNeedsRole' => \Topicmine\Core\Middleware\RouteNeedsRole::class,
        'users.routeNeedsPermission' => \Topicmine\Core\Middleware\RouteNeedsPermission::class,

        /*
         * Third Party
         */
        'jwt.auth' => \Tymon\JWTAuth\Middleware\GetUserFromToken::class,
        'jwt.refresh' => \Tymon\JWTAuth\Middleware\RefreshToken::class,
        'cors' => \Barryvdh\Cors\HandleCors::class,

        'auth' => \Illuminate\Auth\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'bindings' => \Illuminate\Routing\Middleware\SubstituteBindings::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
    ];
}
