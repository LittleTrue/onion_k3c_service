<?php

namespace onion\OnionK3cClient\K3cMessage\WarehouseData;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

/**
 * Class ServiceProvider.
 */
class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $app)
    {
        $app['warehouse_data'] = function ($app) {
            return new Client($app);
        };
    }
}
