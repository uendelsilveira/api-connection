<?php
/*
 By Uendel Silveira
 Developer Web
 IDE: PhpStorm
 Created: 18/11/2025 15:09:42
*/

namespace UendelSilveira\ApiConnection\AuthApi;

use Illuminate\Support\ServiceProvider;
use UendelSilveira\ApiConnection\AuthApi\Commands\InstallCommand;

class AuthApiServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/auth-api.php',
            'auth-api'
        );
    }

    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallCommand::class,
            ]);
        }
        
        // Carrega rotas apenas se o arquivo existir e tiver conteúdo
        if (file_exists(__DIR__.'/Routes/api.php')) {
            $this->loadRoutesFrom(__DIR__.'/Routes/api.php');
        }
        
        // Carrega migrations
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        
        // Publica configurações
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/auth-api.php' => config_path('auth-api.php'),
            ], 'auth-api-config');
            
            $this->publishes([
                __DIR__.'/../database/migrations' => database_path('migrations'),
            ], 'auth-api-migrations');
        }
    }
}
