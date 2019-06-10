<?php
namespace Soltexmedia\Api;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Request;

class Affiliates extends RingbaApi {

    /**
     * Get Affiliates
     *
     * @param string $accountId
     * @return array
     * @throws \Exception
     */

    public function getAffiliates(string $accountId)
    {
        $request = $this->getAffiliatesRequest($accountId);

        try {
            $response = $this->client->send($request, ['headers' => $this->requestHeaders]);
        } catch (GuzzleException $e) {
            throw new \Exception($e->getMessage());
        }

        $statusCode = $response->getStatusCode();
        $this->checkStatusCodeIsGreen($statusCode, $request);

        $json = $response->getBody()->getContents();
        $data = json_decode($json);
        $data = $data->affiliates;

        return $data;
    }

    /**
     * Create request for operation 'getAffiliates'
     *
     * @param  string $accountId
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Psr7\Request
     */

    private function getAffiliatesRequest(string $accountId)
    {
        $resourcePath = "/{accountId}/Affiliates";

        $resourcePath = str_replace("{accountId}", $accountId, $resourcePath);
        $requestUrl = $this->config->getHost() . $resourcePath;

        $request = new Request('GET', $requestUrl);

        return $request;
    }

    /**
     * Add Affiliate
     *
     * @param string $accountId
     * @param array $values
     * @return array
     * @throws \Exception
     */

    public function addAffiliate(string $accountId, array $values)
    {
        $request = $this->addAffiliateRequest($accountId);

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
     * Create request for operation 'addAffiliate'
     *
     * @param  string $accountId
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Psr7\Request
     */

    private function addAffiliateRequest(string $accountId)
    {
        $resourcePath = "/{accountId}/Affiliates";

        $resourcePath = str_replace("{accountId}", $accountId, $resourcePath);
        $requestUrl = $this->config->getHost() . $resourcePath;

        $request = new Request('POST', $requestUrl);

        return $request;
    }

    /**
     * Get Affiliates stats
     *
     * @param string $accountId
     * @return object
     * @throws \Exception
     */

    public function getAffiliatesStats(string $accountId)
    {
        $request = $this->getAffiliatesStatsRequest($accountId);

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
     * Create request for operation 'getAffiliatesStats'
     *
     * @param  string $accountId
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Psr7\Request
     */

    private function getAffiliatesStatsRequest(string $accountId)
    {
        $resourcePath = "/{accountId}/Affiliates/stats";

        $resourcePath = str_replace("{accountId}", $accountId, $resourcePath);

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('GET', $requestUrl);

        return $request;
    }

    /**
     * Delete Affiliate
     *
     * @param string $accountId
     * @param string $affiliateId
     * @return array
     * @throws \Exception
     */

    public function deleteAffiliate(string $accountId, string $affiliateId)
    {
        $request = $this->deleteAffiliateRequest($accountId, $affiliateId);

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
     * Create request for operation 'deleteAffiliate'
     *
     * @param string $accountId
     * @param string $affiliateId
     * @return \GuzzleHttp\Psr7\Request
     */

    private function deleteAffiliateRequest(string $accountId, string $affiliateId)
    {
        $resourcePath = "/{accountId}/Affiliates/{id}";

        $resourcePath = str_replace("{accountId}", $accountId, $resourcePath);
        $resourcePath = str_replace("{id}", $affiliateId, $resourcePath);

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('DELETE', $requestUrl);

        return $request;
    }

    /**
     * Get Affiliate
     *
     * @param string $accountId
     * @param string $affiliateId
     * @return array
     * @throws \Exception
     */

    public function getAffiliate(string $accountId, string $affiliateId)
    {
        $request = $this->getAffiliateRequest($accountId, $affiliateId);

        try {
            $response = $this->client->send($request, ['headers' => $this->requestHeaders]);
        } catch (GuzzleException $e) {
            throw new \Exception($e->getMessage());
        }

        $statusCode = $response->getStatusCode();
        $this->checkStatusCodeIsGreen($statusCode, $request);

        $json = $response->getBody()->getContents();
        $data = json_decode($json);
        $data = $data->affiliate;

        return $data;
    }

    /**
     * Create request for operation 'getAffiliate'
     *
     * @param string $accountId
     * @param string $affiliateId
     * @return \GuzzleHttp\Psr7\Request
     */

    private function getAffiliateRequest(string $accountId, string $affiliateId)
    {
        $resourcePath = "/{accountId}/Affiliates/{id}";

        $resourcePath = str_replace("{accountId}", $accountId, $resourcePath);
        $resourcePath = str_replace("{id}", $affiliateId, $resourcePath);

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('GET', $requestUrl);

        return $request;
    }

    /**
     * Update Affiliate
     *
     * @param string $accountId
     * @param string $affiliateId
     * @param array $values
     * @return array
     * @throws \Exception
     */

    public function updateAffiliate(string $accountId, string $affiliateId, array $values)
    {
        $request = $this->updateAffiliateRequest($accountId, $affiliateId);

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
     * Create request for operation 'updateAffiliate'
     *
     * @param string $accountId
     * @param string $affiliateId
     * @return \GuzzleHttp\Psr7\Request
     */

    private function updateAffiliateRequest(string $accountId, string $affiliateId)
    {
        $resourcePath = "/{accountId}/Affiliates/{id}";

        $resourcePath = str_replace("{accountId}", $accountId, $resourcePath);
        $resourcePath = str_replace("{id}", $affiliateId, $resourcePath);

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('PATCH', $requestUrl);

        return $request;
    }

    /**
     * Get Affiliate Numbers
     *
     * @param string $accountId
     * @param string $affiliateId
     * @return array
     * @throws \Exception
     */

    public function getAffiliateNumbers(string $accountId, string $affiliateId)
    {
        $request = $this->getAffiliateNumbersRequest($accountId, $affiliateId);

        try {
            $response = $this->client->send($request, ['headers' => $this->requestHeaders]);
        } catch (GuzzleException $e) {
            throw new \Exception($e->getMessage());
        }

        $statusCode = $response->getStatusCode();
        $this->checkStatusCodeIsGreen($statusCode, $request);

        $json = $response->getBody()->getContents();
        $data = json_decode($json);
        $data = $data->numbers;

        return $data;
    }

    /**
     * Create request for operation 'getAffiliateNumbers'
     *
     * @param string $accountId
     * @param string $affiliateId
     * @return \GuzzleHttp\Psr7\Request
     */

    private function getAffiliateNumbersRequest(string $accountId, string $affiliateId)
    {
        $resourcePath = "/{accountId}/Affiliates/{id}/Numbers";

        $resourcePath = str_replace("{accountId}", $accountId, $resourcePath);
        $resourcePath = str_replace("{id}", $affiliateId, $resourcePath);

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('GET', $requestUrl);

        return $request;
    }

    /**
     * Get Affiliate Users
     *
     * @param string $accountId
     * @param string $affiliateId
     * @return array
     * @throws \Exception
     */

    public function getAffiliateUsers(string $accountId, string $affiliateId)
    {
        $request = $this->getAffiliateUsersRequest($accountId, $affiliateId);

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
     * Create request for operation 'getAffiliateUsers'
     *
     * @param string $accountId
     * @param string $affiliateId
     * @return \GuzzleHttp\Psr7\Request
     */

    private function getAffiliateUsersRequest(string $accountId, string $affiliateId)
    {
        $resourcePath = "/{accountId}/Affiliates/{id}/Users";

        $resourcePath = str_replace("{accountId}", $accountId, $resourcePath);
        $resourcePath = str_replace("{id}", $affiliateId, $resourcePath);

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('GET', $requestUrl);

        return $request;
    }

    /**
     * Get Affiliate Inbound References
     *
     * @param string $accountId
     * @param string $affiliateId
     * @return array
     * @throws \Exception
     */

    public function getAffiliateInboundReferences(string $accountId, string $affiliateId)
    {
        $request = $this->getAffiliateInboundReferencesRequest($accountId, $affiliateId);

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
     * Create request for operation 'getAffiliateInboundReferences'
     *
     * @param string $accountId
     * @param string $affiliateId
     * @return \GuzzleHttp\Psr7\Request
     */

    private function getAffiliateInboundReferencesRequest(string $accountId, string $affiliateId)
    {
        $resourcePath = "/{accountId}/Affiliates/{id}/InboundReferences";

        $resourcePath = str_replace("{accountId}", $accountId, $resourcePath);
        $resourcePath = str_replace("{id}", $affiliateId, $resourcePath);

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('GET', $requestUrl);

        return $request;
    }
}