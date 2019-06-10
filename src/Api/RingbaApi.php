<?php
namespace Soltexmedia\Api;

use Soltexmedia\Config;
use GuzzleHttp\Client;

class RingbaApi {
    protected $config;
    protected $client;
    protected $requestHeaders;
    protected $access_token;

    public function __construct(Config $config)
    {
        $this->config = $config;
        $this->access_token = $this->config->getToken();
        $this->client = new Client();

        $this->requestHeaders = [
            'Content-Type' => 'application/json',
            'Charset' => 'UTF-8',
            'Authorization' => "Bearer " . $this->access_token
        ];
    }

    /**
     * @param $statusCode
     * @param \GuzzleHttp\Psr7\Request $request
     * @throws \Exception
     */
    protected function checkStatusCodeIsGreen($statusCode, \GuzzleHttp\Psr7\Request $request)
    {
        if ($statusCode < 200 || $statusCode > 299) {
            throw new \Exception(sprintf(
                '[%d] Error connecting to the API (%s)',
                $statusCode,
                $request->getUri()
            ));
        }
    }


}