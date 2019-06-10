<?php
namespace Soltexmedia\Api;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Request;

class PhoneLookup extends RingbaApi {
    /**
     * Get Available Numbers
     *
     * @param string $accountId
     * @param array $values
     * @return object
     * @throws \Exception
     */

    public function getAvailableNumbers(string $accountId, array $values)
    {
        $request = $this->getAvailableNumbersRequest($accountId);

        try {
            $response = $this->client->send($request, [
                'headers' => $this->requestHeaders,
                'json'    => $values
            ]);
        } catch (GuzzleException $e) {
            throw new \Exception($e->getMessage());
        }

        $statusCode = $response->getStatusCode();
        $this->checkStatusCodeIsGreen($statusCode, $request);

        $json = $response->getBody()->getContents();
        $data = json_decode($json);

        return $data;
    }

    /**
     * Create request for operation 'getAvailableNumbers'
     *
     * @param  string $accountId
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Psr7\Request
     */

    private function getAvailableNumbersRequest(string $accountId)
    {
        $resourcePath = "/{accountId}/phoneNumberLookup";

        $resourcePath = str_replace("{accountId}", $accountId, $resourcePath);

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('POST', $requestUrl);

        return $request;
    }
}