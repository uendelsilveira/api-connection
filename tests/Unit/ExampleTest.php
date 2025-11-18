<?php
/*
 By Uendel Silveira
 Developer Web
 IDE: PhpStorm
 Created: 18/11/2025 02:28:37
*/

namespace UendelSilveira\ApiConnection\Tests\Unit;

use UendelSilveira\ApiConnection\Tests\TestCase;

class ExampleTest extends TestCase
{
    /** @test */
    public function it_can_run_tests(): void
    {
        $this->assertTrue(true);
    }

    /** @test */
    public function service_provider_is_loaded(): void
    {
        $providers = $this->app->getLoadedProviders();
        
        $this->assertArrayHasKey(
            'UendelSilveira\ApiConnection\AuthApi\AuthApiServiceProvider',
            $providers
        );
    }
}
