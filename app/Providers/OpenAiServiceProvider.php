<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class OpenAiServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\OpenAI\Client::class, function () {
            return \OpenAI::client(config('services.open_ai.secret'));
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
