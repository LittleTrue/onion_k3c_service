<?php

namespace onion\OnionK3cService;

use onion\OnionK3cClient\Application;
use onion\OnionK3cClient\Base\Exceptions\ClientError;

/**
 * 销售退货.
 */
class SalesReturnService
{
    /**
     * @var SalesReturn
     */
    private $_salesReturn;

    public function __construct(Application $app)
    {
        $this->_salesReturn = $app['sales_return'];
    }

    /**
     * 销售退货.
     *
     * @throws ClientError
     * @throws \Exception
     */
    public function returnStock(array $infos)
    {
        if (empty($infos)) {
            throw new ClientError('参数缺失', 1000001);
        }

        return $this->_salesReturn->returnStock($infos);
    }
}
