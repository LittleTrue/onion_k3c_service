<?php

namespace onion\OnionK3cService;

use onion\OnionK3cClient\Application;
use onion\OnionK3cClient\Base\Exceptions\ClientError;

/**
 * 采购入库.
 */
class MakePurInStockService
{
    /**
     * @var MakePurInStock
     */
    private $_makePurInStock;

    public function __construct(Application $app)
    {
        $this->_makePurInStock = $app['make_pur_in_stock'];
    }

    /**
     * 采购入库.
     *
     * @throws ClientError
     * @throws \Exception
     */
    public function purchase(array $infos)
    {
        if (empty($infos)) {
            throw new ClientError('参数缺失', 1000001);
        }

        return $this->_makePurInStock->purchase($infos);
    }
}
