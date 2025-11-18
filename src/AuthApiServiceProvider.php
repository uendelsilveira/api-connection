<?php
namespace UendelSilveira\ApiConnection\AuthApi;

use Illuminate\Support\ServiceProvider;
use UendelSilveira\ApiConnection\AuthApi\Commands\InstallCommand;

class AuthApiServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/auth-api.php', 'auth-api');
    }

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/api.php');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        
        $this->publishes([
            __DIR__.'/../config/auth-api.php' => config_path('auth-api.php'),
        ], 'auth-api-config');
        
        $this->publishes([
            __DIR__.'/../database/migrations' => database_path('migrations'),
        ], 'auth-api-migrations');
        
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallCommand::class,
            ]);
        }
    }
}
