<?php

namespace onion\OnionK3cClient\K3cMessage\MakePurInStock;

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
     * 采购入库.
     *
     * @throws ClientError
     */
    public function purchase(array $infos)
    {
        $this->setParams($infos);

        return $this->httpPostJson('MakePurInStock');
    }
}
