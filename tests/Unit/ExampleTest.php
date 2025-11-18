<?php

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
