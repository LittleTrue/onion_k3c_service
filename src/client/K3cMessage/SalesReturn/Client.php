<?php

namespace onion\OnionK3cClient\K3cMessage\SalesReturn;

use onion\OnionK3cClient\Application;
use onion\OnionK3cClient\Base\BaseClient;

/**
 * 客户端.
 */
class Client extends BaseClient
{
    /**
     * @var Application
     */
    protected $credentialValidate;

    public function __construct(Application $app)
    {
        parent::__construct($app);
        $this->credentialValidate = $app['credential'];
    }

    /**
     * 销售退货.
     *
     * @throws ClientError
     */
    public function returnStock(array $infos)
    {
        $this->setParams($infos);

        return $this->httpPostJson('MakeSalReturnStock');
    }
}
