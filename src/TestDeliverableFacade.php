<?php

namespace Rayblair\TestDeliverable;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Rayblair\TestDeliverable\Skeleton\SkeletonClass
 */
class TestDeliverableFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'test-deliverable';
    }
}
