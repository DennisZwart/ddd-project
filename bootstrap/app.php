<?php
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))
//    ->booting(function (Application $app) {
//        $app->useAppPath(base_path('src'));
//    })
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        channels: __DIR__.'/../routes/channels.php',
        health: '/up',
        then: function () {
            // Automatically load domain routes
            foreach (glob(base_path('src/*/*/Routes/v1/*.routes.php')) as $file) {
                Route::middleware('api')
                    ->prefix('api/v1')
                    ->name('api.v1.')
                    ->group($file);
            }

            foreach (glob(base_path('src/*/*/Routes/App/*.routes.php')) as $file) {
                Route::middleware('web')
                    ->group($file);
            }
        }
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->web(append: [
        ]);
    })
    ->withSchedule(function (Illuminate\Console\Scheduling\Schedule $schedule) {
        // $schedule->command()->everyMinute();
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })
    ->create();
