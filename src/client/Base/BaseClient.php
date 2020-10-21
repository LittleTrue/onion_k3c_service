<?php

namespace onion\OnionK3cClient\Base;

use GuzzleHttp\RequestOptions;
use onion\OnionK3cClient\Application;
use onion\OnionK3cClient\Base\Exceptions\ClientError;

/**
 * 底层请求.
 */
class BaseClient
{
    use MakesHttpRequests;

    /**
     * @var Application
     */
    protected $app;

    /**
     * @var array
     */
    protected $json = [];

    /**
     * @var string
     */
    protected $language = 'zh-cn';

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    /**
     * 获取特定位数时间戳.
     * @return int
     */
    public function getTimestamp($digits = 10)
    {
        $digits = $digits > 10 ? $digits : 10;

        $digits = $digits - 10;

        if ((!$digits) || (10 == $digits)) {
            return time();
        }

        return number_format(microtime(true), $digits, '', '') - 50000;
    }

    /**
     * 浮点数比较规则.
     * @return int
     */
    public function floatCmp($f1, $f2, $precision = 10)
    {
        $e  = pow(10, $precision);
        $i1 = intval($f1 * $e);
        $i2 = intval($f2 * $e);
        return $i1 == $i2;
    }

    /**
     * Set Headers Language params.
     *
     * @param string $language 请求头中的语种标识
     */
    public function setLanguage($language)
    {
        $this->language = $language;
    }

    /**
     * Make a get request.
     *
     * @throws ClientError
     */
    public function httpGet($uri, array $options = [])
    {
        $options = $this->_headers($options);

        return $this->request('GET', $uri, $options);
    }

    /**
     * Make a post request.
     *
     * @throws ClientError
     */
    public function httpPostJson($uri)
    {
        return $this->requestPost($uri, [RequestOptions::JSON => $this->json]);
    }

    /**
     * Set json params.
     *
     * @param array $json Json参数
     */
    public function setParams(array $json)
    {
        //数据公共格式
        $param = [
            'account'  => $json['account'],
            'key'      => $json['key'],
            'ItemList' => $json['ItemList'],
        ];

        $this->json = $param;
    }

    /**
     * @throws ClientError
     */
    protected function requestPost($uri, array $options = [])
    {
        $options = $this->_headers($options);

        return $this->request('POST', $uri, $options);
    }

    /**
     * set Headers.
     *
     * @return array
     */
    private function _headers(array $options = [])
    {
        $time = time();

        $options[RequestOptions::HEADERS] = [
            'Content-Type' => 'application/json',
            'timestamp'    => $time,
        ];
        return $options;
    }
}
