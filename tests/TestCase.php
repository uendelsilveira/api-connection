<?php
/*
 By Uendel Silveira
 Developer Web
 IDE: PhpStorm
 Created: 18/11/2025 02:28:37
*/

namespace UendelSilveira\ApiConnection\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use UendelSilveira\ApiConnection\AuthApi\AuthApiServiceProvider;

abstract class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();
        
        // Configurações adicionais para os testes
    }

    protected function getPackageProviders($app): array
    {
        return [
            AuthApiServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app): void
    {
        // Configuração do ambiente de teste
        $app['config']->set('database.default', 'testing');
        $app['config']->set('database.connections.testing', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);
    }
}
