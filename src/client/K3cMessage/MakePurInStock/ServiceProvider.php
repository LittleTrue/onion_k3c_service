<?php

namespace onion\OnionK3cClient\K3cMessage\MakePurInStock;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

/**
 * Class ServiceProvider.
 */
class ServiceProvider implements ServiceProviderInterface
{
    public function register(Container $app)
    {
        $app['make_pur_in_stock'] = function ($app) {
            return new Client($app);
        };
    }
}
