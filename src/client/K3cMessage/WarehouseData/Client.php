<?php

namespace onion\OnionK3cClient\K3cMessage\WarehouseData;

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
     * 仓库基础数据.
     *
     * @throws ClientError
     */
    public function wareHouseQuery(array $infos)
    {
        $this->setParams($infos);

        return $this->httpPostJson('MakeStock');
    }
}
