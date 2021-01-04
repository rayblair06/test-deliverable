<?php

namespace Rayblair\TestDeliverable\Tests;

use Orchestra\Testbench\TestCase;
use Rayblair\TestDeliverable\TestDeliverableServiceProvider;

class ExampleTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [TestDeliverableServiceProvider::class];
    }
    
    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
