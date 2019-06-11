<?php
namespace Soltexmedia\Api;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Request;

class Target extends RingbaApi {

    /**
     * Get Targets
     *
     * @param string $accountId
     * @param bool $includeStats
     * @return array
     * @throws \Exception
     */

    public function getTargets(string $accountId, bool $includeStats = false)
    {
        $request = $this->getTargetsRequest($accountId);

        try {
            $response = $this->client->send($request, [
                'headers' => $this->requestHeaders,
                'query'   => [
                    'includeStats' => $includeStats
                ]
            ]);
        } catch (GuzzleException $e) {
            throw new \Exception($e->getMessage());
        }

        $statusCode = $response->getStatusCode();
        $this->checkStatusCodeIsGreen($statusCode, $request);

        $json = $response->getBody()->getContents();
        $data = json_decode($json);
        $data = $data->targets;

        return $data;
    }

    /**
     * Create request for operation 'getTargets'
     *
     * @param  string $accountId
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Psr7\Request
     */

    private function getTargetsRequest(string $accountId)
    {
        $resourcePath = "/{accountId}/targets";

        $resourcePath = str_replace("{accountId}", $accountId, $resourcePath);
        $requestUrl = $this->config->getHost() . $resourcePath;

        $request = new Request('GET', $requestUrl);

        return $request;
    }

    /**
     * Add Target
     *
     * @param string $accountId
     * @param array $values
     * @return object
     * @throws \Exception
     */

    public function addTarget(string $accountId, array $values)
    {
        $request = $this->addTargetRequest($accountId);

        try {
            $response = $this->client->send($request, [
                'headers' => $this->requestHeaders,
                'json'   => $values
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
     * Create request for operation 'addTarget'
     *
     * @param  string $accountId
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Psr7\Request
     */

    private function addTargetRequest(string $accountId)
    {
        $resourcePath = "/{accountId}/targets";

        $resourcePath = str_replace("{accountId}", $accountId, $resourcePath);
        $requestUrl = $this->config->getHost() . $resourcePath;

        $request = new Request('POST', $requestUrl);

        return $request;
    }

    /**
     * Delete Target
     *
     * @param string $accountId
     * @param string $targetId
     * @param bool $force
     * @param bool $keepNumbers
     * @return array
     * @throws \Exception
     */

    public function deleteTarget(string $accountId, string $targetId, bool $force = false, bool $keepNumbers = false)
    {
        $request = $this->deleteTargetRequest($accountId, $targetId);

        try {
            $response = $this->client->send($request, [
                'headers' => $this->requestHeaders,
                'query'   => [
                    "force"       => $force,
                    "keepNumbers" => $keepNumbers
                ]
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
     * Create request for operation 'deleteTarget'
     *
     * @param  string $accountId
     * @param string $targetId
     * @return \GuzzleHttp\Psr7\Request
     */

    private function deleteTargetRequest(string $accountId, string $targetId)
    {
        $resourcePath = "/{accountId}/targets/{id}";

        $resourcePath = str_replace("{accountId}", $accountId, $resourcePath);
        $resourcePath = str_replace("{id}", $targetId, $resourcePath);
        $requestUrl = $this->config->getHost() . $resourcePath;

        $request = new Request('DELETE', $requestUrl);

        return $request;
    }

    /**
     * Get Target
     *
     * @param string $accountId
     * @param string $targetId
     * @return object
     * @throws \Exception
     */

    public function getTarget(string $accountId, string $targetId)
    {
        $request = $this->getTargetRequest($accountId, $targetId);

        try {
            $response = $this->client->send($request, [
                'headers' => $this->requestHeaders,
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
     * Create request for operation 'getTarget'
     *
     * @param string $accountId
     * @param string $targetId
     * @return \GuzzleHttp\Psr7\Request
     */

    private function getTargetRequest(string $accountId, string $targetId)
    {
        $resourcePath = "/{accountId}/targets/{id}";

        $resourcePath = str_replace("{accountId}", $accountId, $resourcePath);
        $resourcePath = str_replace("{id}", $targetId, $resourcePath);
        $requestUrl = $this->config->getHost() . $resourcePath;

        $request = new Request('GET', $requestUrl);

        return $request;
    }

    /**
     * Update Target
     *
     * @param string $accountId
     * @param string $targetId
     * @param array $values
     * @return object
     * @throws \Exception
     */

    public function updateTarget(string $accountId, string $targetId, array $values)
    {
        $request = $this->updateTargetRequest($accountId, $targetId);

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
     * Create request for operation 'updateTarget'
     *
     * @param string $accountId
     * @param string $targetId
     * @return \GuzzleHttp\Psr7\Request
     */

    private function updateTargetRequest(string $accountId, string $targetId)
    {
        $resourcePath = "/{accountId}/targets/{id}";

        $resourcePath = str_replace("{accountId}", $accountId, $resourcePath);
        $resourcePath = str_replace("{id}", $targetId, $resourcePath);
        $requestUrl = $this->config->getHost() . $resourcePath;

        $request = new Request('PATCH', $requestUrl);

        return $request;
    }

    /**
     * Get Target counts
     *
     * @param string $accountId
     * @param string $targetId
     * @return object
     * @throws \Exception
     */

    public function getTargetCounts(string $accountId, string $targetId)
    {
        $request = $this->getTargetCountsRequest($accountId, $targetId);

        try {
            $response = $this->client->send($request, [
                'headers' => $this->requestHeaders,
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
     * Create request for operation 'getTargetCounts'
     *
     * @param string $accountId
     * @param string $targetId
     * @return \GuzzleHttp\Psr7\Request
     */

    private function getTargetCountsRequest(string $accountId, string $targetId)
    {
        $resourcePath = "/{accountId}/targets/{id}/Counts";

        $resourcePath = str_replace("{accountId}", $accountId, $resourcePath);
        $resourcePath = str_replace("{id}", $targetId, $resourcePath);
        $requestUrl = $this->config->getHost() . $resourcePath;

        $request = new Request('GET', $requestUrl);

        return $request;
    }

    /**
     * Reset Target counts
     *
     * @param string $accountId
     * @param string $targetId
     * @return object
     * @throws \Exception
     */

    public function resetTargetCounts(string $accountId, string $targetId)
    {
        $request = $this->resetTargetCountsRequest($accountId, $targetId);

        try {
            $response = $this->client->send($request, [
                'headers' => $this->requestHeaders,
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
     * Create request for operation 'resetTargetCounts'
     *
     * @param string $accountId
     * @param string $targetId
     * @return \GuzzleHttp\Psr7\Request
     */

    private function resetTargetCountsRequest(string $accountId, string $targetId)
    {
        $resourcePath = "/{accountId}/targets/{id}/ResetCount";

        $resourcePath = str_replace("{accountId}", $accountId, $resourcePath);
        $resourcePath = str_replace("{id}", $targetId, $resourcePath);
        $requestUrl = $this->config->getHost() . $resourcePath;

        $request = new Request('DELETE', $requestUrl);

        return $request;
    }

    /**
     * Target buyer toggle pause
     *
     * @param string $accountId
     * @param string $targetId
     * @return object
     * @throws \Exception
     */

    public function targetBuyerTogglePause(string $accountId, string $targetId)
    {
        $request = $this->targetBuyerTogglePauseRequest($accountId, $targetId);

        try {
            $response = $this->client->send($request, [
                'headers' => $this->requestHeaders,
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
     * Create request for operation 'targetBuyerTogglePause'
     *
     * @param string $accountId
     * @param string $targetId
     * @return \GuzzleHttp\Psr7\Request
     */

    private function targetBuyerTogglePauseRequest(string $accountId, string $targetId)
    {
        $resourcePath = "/{accountId}/targets/{id}/BuyerTogglePause";

        $resourcePath = str_replace("{accountId}", $accountId, $resourcePath);
        $resourcePath = str_replace("{id}", $targetId, $resourcePath);
        $requestUrl = $this->config->getHost() . $resourcePath;

        $request = new Request('PUT', $requestUrl);

        return $request;
    }

    /**
     * Target set concurrency cap
     *
     * @param string $accountId
     * @param string $targetId
     * @param array $values
     * @return object
     * @throws \Exception
     */

    public function targetSetConcurrencyCap(string $accountId, string $targetId, array $values)
    {
        $request = $this->targetSetConcurrencyCapRequest($accountId, $targetId);

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
     * Create request for operation 'targetSetConcurrencyCap'
     *
     * @param string $accountId
     * @param string $targetId
     * @return \GuzzleHttp\Psr7\Request
     */

    private function targetSetConcurrencyCapRequest(string $accountId, string $targetId)
    {
        $resourcePath = "/{accountId}/targets/{id}/BuyerSetConcurrencyCap";

        $resourcePath = str_replace("{accountId}", $accountId, $resourcePath);
        $resourcePath = str_replace("{id}", $targetId, $resourcePath);
        $requestUrl = $this->config->getHost() . $resourcePath;

        $request = new Request('PUT', $requestUrl);

        return $request;
    }

    /**
     * check Target is duplicate
     *
     * @param string $accountId
     * @param array $target
     * @return object
     * @throws \Exception
     */

    public function targetCheckIfDuplicate(string $accountId, array $target)
    {
        $request = $this->targetCheckIfDuplicateRequest($accountId);

        try {
            $response = $this->client->send($request, [
                'headers' => $this->requestHeaders,
                'json'    => $target
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
     * Create request for operation 'targetCheckIfDuplicate'
     *
     * @param string $accountId
     * @return \GuzzleHttp\Psr7\Request
     */

    private function targetCheckIfDuplicateRequest(string $accountId)
    {
        $resourcePath = "/{accountId}/targets/isDuplicate";

        $resourcePath = str_replace("{accountId}", $accountId, $resourcePath);
        $requestUrl = $this->config->getHost() . $resourcePath;

        $request = new Request('POST', $requestUrl);

        return $request;
    }

    /**
     * target add Buyer
     *
     * @param string $accountId
     * @param string $targetId
     * @param array $values
     * @return object
     * @throws \Exception
     */

    public function addBuyer(string $accountId, string $targetId, array $values)
    {
        $request = $this->addBuyerRequest($accountId, $targetId);

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
     * Create request for operation 'addBuyer'
     *
     * @param string $accountId
     * @param string $targetId
     * @return \GuzzleHttp\Psr7\Request
     */

    private function addBuyerRequest(string $accountId, string $targetId)
    {
        $resourcePath = "/{accountId}/targets/{id}/Buyer";

        $resourcePath = str_replace("{accountId}", $accountId, $resourcePath);
        $resourcePath = str_replace("{id}", $targetId, $resourcePath);
        $requestUrl = $this->config->getHost() . $resourcePath;

        $request = new Request('PUT', $requestUrl);

        return $request;
    }

    /**
     * target delete Buyer
     *
     * @param string $accountId
     * @param string $targetId
     * @param string $buyerId
     * @return object
     * @throws \Exception
     */

    public function deleteBuyer(string $accountId, string $targetId, string $buyerId)
    {
        $request = $this->deleteBuyerRequest($accountId, $targetId);

        try {
            $response = $this->client->send($request, [
                'headers' => $this->requestHeaders,
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
     * Create request for operation 'deleteBuyer'
     *
     * @param string $accountId
     * @param string $targetId
     * @param string $buyerId
     * @return \GuzzleHttp\Psr7\Request
     */

    private function deleteBuyerRequest(string $accountId, string $targetId, string $buyerId)
    {
        $resourcePath = "/{accountId}/targets/{id}/Buyer/{buyerId}";

        $resourcePath = str_replace("{accountId}", $accountId, $resourcePath);
        $resourcePath = str_replace("{id}", $targetId, $resourcePath);
        $resourcePath = str_replace("{buyerId}", $buyerId, $resourcePath);
        $requestUrl = $this->config->getHost() . $resourcePath;

        $request = new Request('DELETE', $requestUrl);

        return $request;
    }

    /**
     * target inbound references
     *
     * @param string $accountId
     * @param string $targetId
     * @return object
     * @throws \Exception
     */

    public function getInboundReferences(string $accountId, string $targetId)
    {
        $request = $this->getInboundReferencesRequest($accountId, $targetId);

        try {
            $response = $this->client->send($request, [
                'headers' => $this->requestHeaders,
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
     * Create request for operation 'getInboundReferences'
     *
     * @param string $accountId
     * @param string $targetId
     * @return \GuzzleHttp\Psr7\Request
     */

    private function getInboundReferencesRequest(string $accountId, string $targetId)
    {
        $resourcePath = "/{accountId}/targets/{id}/InboundReferences";

        $resourcePath = str_replace("{accountId}", $accountId, $resourcePath);
        $resourcePath = str_replace("{id}", $targetId, $resourcePath);
        $requestUrl = $this->config->getHost() . $resourcePath;

        $request = new Request('GET', $requestUrl);

        return $request;
    }
}