<?php

namespace Likeaway\Calculator\Providers;

use Illuminate\Routing\ResponseFactory;
use Illuminate\Support\ServiceProvider;

class CalculatorServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/../views', 'calculator');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(ResponseFactory $factory)
    {
        $factory->macro('success', function ($message, $data) use ($factory) {
            $format = [
                'status'  => 'ok',
                'request' => request()->segments(),
                'message' => $message,
                'data'    => $data,
            ];
            return $factory->make($format);
        });

        $factory->macro('error', function ($error_message, $error_code) use ($factory) {
            $format = [
                'status'  => 'error',
                'request' => request()->segments(),
                'message' => $error_message,
                'code'    => $error_code,
            ];

            return $factory->make($format);

        });
    }
}
