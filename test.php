<?php

require_once __DIR__ . '/vendor/autoload.php';

use onion\OnionK3cClient\Application;
use onion\OnionK3cService\WarehouseDataService;

// use customs\CustomsTradePostFactory;

$config = [
    'base_uri' => 'http://211.159.188.132/K3CloudApi/AppMallApi.asmx?op=',
];

$ioc_con_app = new Application($config);

$warehouseDataService = new WarehouseDataService($ioc_con_app);

$info = [
    'account'  => '5b53466925c1f2',
    'key'      => 'kingdee',
    'ItemList' => [
        [
            'Number'    => 'CK001',
            'Name'      => '仓库2019',
            'CreateOrg' => '0001',
            'UseOrg'    => '0001',
            'ERPPro'    => '1',
            'Group'     => 'test',
            'Flage'     => '1',
            'Remark'    => 'test',
        ],
    ],
];

$tmp = $warehouseDataService->wareHouseQuery($info);
var_dump($tmp);
die();
