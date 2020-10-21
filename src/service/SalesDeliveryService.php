<?php

namespace onion\OnionK3cService;

use onion\OnionK3cClient\Application;
use onion\OnionK3cClient\Base\Exceptions\ClientError;

/**
 * 销售出库.
 */
class SalesDeliveryService
{
    /**
     * @var SalesDelivery
     */
    private $_salesDelivery;

    public function __construct(Application $app)
    {
        $this->_salesDelivery = $app['sales_delivery'];
    }

    /**
     * 销售出库.
     *
     * @throws ClientError
     * @throws \Exception
     */
    public function salesOutStock(array $infos)
    {
        if (empty($infos)) {
            throw new ClientError('参数缺失', 1000001);
        }

        return $this->_salesDelivery->salesOutStock($infos);
    }
}
