<?php
namespace Soltexmedia\Api;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Request;

class Buyers extends RingbaApi {

    /**
     * Get Buyers
     *
     * @param string $accountId
     * @return object
     * @throws \Exception
     */

    public function getBuyers(string $accountId)
    {
        $request = $this->getBuyersRequest($accountId);

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
     * Create request for operation 'getBuyers'
     *
     * @param  string $accountId
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Psr7\Request
     */

    private function getBuyersRequest(string $accountId)
    {
        $resourcePath = "/{accountId}/Buyers";

        $resourcePath = str_replace("{accountId}", $accountId, $resourcePath);
        $requestUrl = $this->config->getHost() . $resourcePath;

        $request = new Request('GET', $requestUrl);

        return $request;
    }

    /**
     * Add Buyer
     *
     * @param string $accountId
     * @param array $values
     * @return array
     * @throws \Exception
     */

    public function addBuyer(string $accountId, array $values)
    {
        $request = $this->addBuyerRequest($accountId);

        try {
            $response = $this->client->send($request, [
                'headers' => $this->requestHeaders,
                'json' => $values
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
     * @param  string $accountId
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Psr7\Request
     */

    private function addBuyerRequest(string $accountId)
    {
        $resourcePath = "/{accountId}/Buyers";

        $resourcePath = str_replace("{accountId}", $accountId, $resourcePath);
        $requestUrl = $this->config->getHost() . $resourcePath;

        $request = new Request('POST', $requestUrl);

        return $request;
    }

    /**
     * Delete Buyer
     *
     * @param string $accountId
     * @param string $buyerId
     * @return array
     * @throws \Exception
     */

    public function deleteBuyer(string $accountId, string $buyerId)
    {
        $request = $this->deleteBuyerRequest($accountId, $buyerId);

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
     * Create request for operation 'deleteBuyer'
     *
     * @param string $accountId
     * @param string $buyerId
     * @return \GuzzleHttp\Psr7\Request
     */

    private function deleteBuyerRequest(string $accountId, string $buyerId)
    {
        $resourcePath = "/{accountId}/Buyers/{id}";

        $resourcePath = str_replace("{accountId}", $accountId, $resourcePath);
        $resourcePath = str_replace("{id}", $buyerId, $resourcePath);

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('DELETE', $requestUrl);

        return $request;
    }

    /**
     * Get Buyer
     *
     * @param string $accountId
     * @param string $buyerId
     * @return object
     * @throws \Exception
     */

    public function getBuyer(string $accountId, string $buyerId)
    {
        $request = $this->getBuyerRequest($accountId, $buyerId);

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
     * Create request for operation 'getBuyer'
     *
     * @param string $accountId
     * @param string $buyerId
     * @return \GuzzleHttp\Psr7\Request
     */

    private function getBuyerRequest(string $accountId, string $buyerId)
    {
        $resourcePath = "/{accountId}/Buyers/{id}";

        $resourcePath = str_replace("{accountId}", $accountId, $resourcePath);
        $resourcePath = str_replace("{id}", $buyerId, $resourcePath);

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('GET', $requestUrl);

        return $request;
    }

    /**
     * Update Buyer
     *
     * @param string $accountId
     * @param string $buyerId
     * @param array $values
     * @return object
     * @throws \Exception
     */

    public function updateBuyer(string $accountId, string $buyerId, array $values)
    {
        $request = $this->updateBuyerRequest($accountId, $buyerId);

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
     * Create request for operation 'updateBuyer'
     *
     * @param string $accountId
     * @param string $buyerId
     * @return \GuzzleHttp\Psr7\Request
     */

    private function updateBuyerRequest(string $accountId, string $buyerId)
    {
        $resourcePath = "/{accountId}/Buyers/{id}";

        $resourcePath = str_replace("{accountId}", $accountId, $resourcePath);
        $resourcePath = str_replace("{id}", $buyerId, $resourcePath);

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('PATCH', $requestUrl);

        return $request;
    }

    /**
     * Get Buyer Targets
     *
     * @param string $accountId
     * @param string $buyerId
     * @return array
     * @throws \Exception
     */

    public function getBuyerTargets(string $accountId, string $buyerId)
    {
        $request = $this->getBuyerTargetsRequest($accountId, $buyerId);

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
     * Create request for operation 'getBuyerTargets'
     *
     * @param string $accountId
     * @param string $buyerId
     * @return \GuzzleHttp\Psr7\Request
     */

    private function getBuyerTargetsRequest(string $accountId, string $buyerId)
    {
        $resourcePath = "/{accountId}/Buyers/{id}/Targets";

        $resourcePath = str_replace("{accountId}", $accountId, $resourcePath);
        $resourcePath = str_replace("{id}", $buyerId, $resourcePath);

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('GET', $requestUrl);

        return $request;
    }

    /**
     * Get Buyer Users
     *
     * @param string $accountId
     * @param string $buyerId
     * @return array
     * @throws \Exception
     */

    public function getBuyerUsers(string $accountId, string $buyerId)
    {
        $request = $this->getBuyerUsersRequest($accountId, $buyerId);

        try {
            $response = $this->client->send($request, ['headers' => $this->requestHeaders]);
        } catch (GuzzleException $e) {
            throw new \Exception($e->getMessage());
        }

        $statusCode = $response->getStatusCode();
        $this->checkStatusCodeIsGreen($statusCode, $request);

        $json = $response->getBody()->getContents();
        $data = json_decode($json);
        $data = $data->users;

        return $data;
    }

    /**
     * Create request for operation 'getBuyerUsers'
     *
     * @param string $accountId
     * @param string $buyerId
     * @return \GuzzleHttp\Psr7\Request
     */

    private function getBuyerUsersRequest(string $accountId, string $buyerId)
    {
        $resourcePath = "/{accountId}/Buyers/{id}/Users";

        $resourcePath = str_replace("{accountId}", $accountId, $resourcePath);
        $resourcePath = str_replace("{id}", $buyerId, $resourcePath);

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('GET', $requestUrl);

        return $request;
    }

    /**
     * Get Buyer Inbound References
     *
     * @param string $accountId
     * @param string $buyerId
     * @return array
     * @throws \Exception
     */

    public function getBuyerInboundReferences(string $accountId, string $buyerId)
    {
        $request = $this->getBuyerInboundReferencesRequest($accountId, $buyerId);

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
     * Create request for operation 'getBuyerInboundReferences'
     *
     * @param string $accountId
     * @param string $buyerId
     * @return \GuzzleHttp\Psr7\Request
     */

    private function getBuyerInboundReferencesRequest(string $accountId, string $buyerId)
    {
        $resourcePath = "/{accountId}/Buyers/{id}/InboundReferences";

        $resourcePath = str_replace("{accountId}", $accountId, $resourcePath);
        $resourcePath = str_replace("{id}", $buyerId, $resourcePath);

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('GET', $requestUrl);

        return $request;
    }
}