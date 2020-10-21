<?php

namespace onion\OnionK3cService;

use onion\OnionK3cClient\Application;
use onion\OnionK3cClient\Base\Exceptions\ClientError;

/**
 * 仓库.
 */
class WarehouseDataService
{
    /**
     * @var WarehouseData
     */
    private $_warehouseData;

    public function __construct(Application $app)
    {
        $this->_warehouseData = $app['warehouse_data'];
    }

    /**
     * 仓库基础数据.
     *
     * @throws ClientError
     * @throws \Exception
     */
    public function wareHouseQuery(array $infos)
    {
        if (empty($infos)) {
            throw new ClientError('参数缺失', 1000001);
        }

        return $this->_warehouseData->wareHouseQuery($infos);
    }
}
