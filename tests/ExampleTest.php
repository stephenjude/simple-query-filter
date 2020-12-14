<?php

namespace Stephenjude\ApiTestHelper\Tests;

use Orchestra\Testbench\TestCase;
use Stephenjude\SimpleQueryFilter\SimpleQueryFilterServiceProvider;

class ExampleTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [SimpleQueryFilterServiceProvider::class];
    }

    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
