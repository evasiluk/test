<?php
namespace Soltexmedia\Api;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Request;


class BlockedNumber extends RingbaApi {

    /**
     * Get Blocked Numbers
     *
     * @param $accountId
     * @return array
     * @throws \Exception
     */

    public function getBlockedNumbers($accountId)
    {
        $request = $this->getBlockedNumbersRequest($accountId);

        try {
            $response = $this->client->send($request, ['headers' => $this->requestHeaders]);
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
     * Create request for operation 'getBlockedNumbers'
     *
     * @param  string $accountId (required)
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Psr7\Request
     */

    private function getBlockedNumbersRequest($accountId)
    {
        $resourcePath = "/{accountId}/blockedNumbers";

        if ($accountId === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $accountId when calling getBlockedNumbers'
            );
        } else {
            $resourcePath = str_replace("{accountId}", $accountId, $resourcePath);
        }

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('GET', $requestUrl);

        return $request;
    }

    /**
     * Add Blocked Number
     *
     * @param $accountId
     * @param $values
     * @return array
     * @throws \Exception
     */

    public function addBlockedNumber($accountId, array $values)
    {
        $request = $this->addBlockedNumberRequest($accountId);

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
     * Create request for operation 'addBlockedNumber'
     *
     * @param  string $accountId (required)
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Psr7\Request
     */

    private function addBlockedNumberRequest($accountId)
    {
        $resourcePath = "/{accountId}/blockedNumbers";

        if ($accountId === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $accountId when calling addBlockedNumber'
            );
        } else {
            $resourcePath = str_replace("{accountId}", $accountId, $resourcePath);
        }

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('POST', $requestUrl);

        return $request;
    }

    /**
     * Get Blocked Number
     *
     * @param $accountId
     * @param $numberId
     * @return array
     * @throws \Exception
     */

    public function deleteBlockedNumber($accountId, $numberId)
    {
        $request = $this->deleteBlockedNumberRequest($accountId, $numberId);

        try {
            $response = $this->client->send($request, ['headers' => $this->requestHeaders]);
        } catch (GuzzleException $e) {
            throw new \Exception($e->getMessage());
        }

        $statusCode = $response->getStatusCode();
        $this->checkStatusCodeIsGreen($statusCode, $request);

        $json = $response->getBody()->getContents();
        $data = json_decode($json);
        $data = $data->isSuccessful;

        return $data;
    }

    /**
     * Create request for operation 'deleteBlockedNumber'
     *
     * @param  string $accountId (required)
     * @param $numberId
     * @return \GuzzleHttp\Psr7\Request
     */

    private function deleteBlockedNumberRequest($accountId, $numberId)
    {
        $resourcePath = "/{accountId}/blockedNumbers/{id}";

        if ($accountId === null || $numberId === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $accountId when calling deleteBlockedNumbers'
            );
        } else {
            $resourcePath = str_replace("{accountId}", $accountId, $resourcePath);
            $resourcePath = str_replace("{id}", $numberId, $resourcePath);
        }

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('DELETE', $requestUrl);

        return $request;
    }

    /**
     * Get Blocked Number
     *
     * @param $accountId
     * @param $numberId
     * @return array
     * @throws \Exception
     */

    public function getBlockedNumber($accountId, $numberId)
    {
        $request = $this->getBlockedNumberRequest($accountId, $numberId);

        try {
            $response = $this->client->send($request, ['headers' => $this->requestHeaders]);
        } catch (GuzzleException $e) {
            throw new \Exception($e->getMessage());
        }

        $statusCode = $response->getStatusCode();
        $this->checkStatusCodeIsGreen($statusCode, $request);

        $json = $response->getBody()->getContents();
        $data = json_decode($json);
        $data = $data->blockedNumber;

        return $data;
    }

    /**
     * Create request for operation 'getBlockedNumber'
     *
     * @param  string $accountId (required)
     * @param $numberId
     * @return \GuzzleHttp\Psr7\Request
     */

    private function getBlockedNumberRequest($accountId, $numberId)
    {
        $resourcePath = "/{accountId}/blockedNumbers/{id}";

        if ($accountId === null || $numberId === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $accountId when calling getBlockedNumber'
            );
        } else {
            $resourcePath = str_replace("{accountId}", $accountId, $resourcePath);
            $resourcePath = str_replace("{id}", $numberId, $resourcePath);
        }

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('GET', $requestUrl);

        return $request;
    }

    /**
     * Get Blocked Number
     *
     * @param $accountId
     * @param $numberId
     * @param $values
     * @return array
     * @throws \Exception
     */

    public function updateBlockedNumber($accountId, $numberId, $values)
    {
        $request = $this->updateBlockedNumberRequest($accountId, $numberId);

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
        $data = $data->blockedNumber;

        return $data;
    }

    /**
     * Create request for operation 'updateBlockedNumber'
     *
     * @param  string $accountId (required)
     * @param $numberId
     * @return \GuzzleHttp\Psr7\Request
     */

    private function updateBlockedNumberRequest($accountId, $numberId)
    {
        $resourcePath = "/{accountId}/blockedNumbers/{id}";

        if ($accountId === null || $numberId === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $accountId when calling updateBlockedNumber'
            );
        } else {
            $resourcePath = str_replace("{accountId}", $accountId, $resourcePath);
            $resourcePath = str_replace("{id}", $numberId, $resourcePath);
        }

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('PATCH', $requestUrl);

        return $request;
    }
}
