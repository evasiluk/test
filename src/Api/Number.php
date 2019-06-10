<?php
namespace Soltexmedia\Api;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Request;

class Number extends RingbaApi {

    /**
     * Get Numbers
     *
     * @param string $accountId
     * @return array
     * @throws \Exception
     */

    public function getNumbers(string $accountId)
    {
        $request = $this->getNumbersRequest($accountId);

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
     * Create request for operation 'getNumbers'
     *
     * @param  string $accountId
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Psr7\Request
     */

    private function getNumbersRequest(string $accountId)
    {
        $resourcePath = "/{accountId}/numbers";

        $resourcePath = str_replace("{accountId}", $accountId, $resourcePath);

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('GET', $requestUrl);

        return $request;
    }

    /**
     * Get Numbers
     *
     * @param string $accountId
     * @param array $values
     * @return object
     * @throws \Exception
     */

    public function addNumber(string $accountId, array $values)
    {
        $request = $this->addNumberRequest($accountId);

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
     * Create request for operation 'addNumber'
     *
     * @param  string $accountId (required)
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Psr7\Request
     */

    private function addNumberRequest(string $accountId)
    {
        $resourcePath = "/{accountId}/numbers";

        $resourcePath = str_replace("{accountId}", $accountId, $resourcePath);

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('POST', $requestUrl);

        return $request;
    }

    /**
     * Delete Number
     *
     * @param string $accountId
     * @param string $numberId
     * @param bool $unlink
     * @return object
     * @throws \Exception
     */

    public function deleteNumber(string $accountId, string $numberId, bool $unlink = false)
    {
        $request = $this->deleteNumberRequest($accountId, $numberId);

        try {
            $response = $this->client->send($request, [
                'headers' => $this->requestHeaders,
                'query'   => [
                    "unlink"   => $unlink,
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
     * Create request for operation 'deleteNumber'
     *
     * @param string $accountId
     * @param string $numberId
     * @return \GuzzleHttp\Psr7\Request
     */

    private function deleteNumberRequest(string $accountId, string $numberId)
    {
        $resourcePath = "/{accountId}/numbers/{id}";

        $resourcePath = str_replace("{accountId}", $accountId, $resourcePath);
        $resourcePath = str_replace("{id}", $numberId, $resourcePath);

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('DELETE', $requestUrl);

        return $request;
    }

    /**
     * Get Number
     *
     * @param string $accountId
     * @param string $numberId
     * @return array
     * @throws \Exception
     */

    public function getNumber(string $accountId, string $numberId)
    {
        $request = $this->getNumberRequest($accountId, $numberId);

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
     * Create request for operation 'getNumber'
     *
     * @param string $accountId (required)
     * @param string $numberId
     * @return \GuzzleHttp\Psr7\Request
     */

    private function getNumberRequest(string $accountId, string $numberId)
    {
        $resourcePath = "/{accountId}/numbers/{id}";

        $resourcePath = str_replace("{accountId}", $accountId, $resourcePath);
        $resourcePath = str_replace("{id}", $numberId, $resourcePath);

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('GET', $requestUrl);

        return $request;
    }

    /**
     * Update Number
     *
     * @param string $accountId
     * @param string $numberId
     * @param array $values
     * @return array
     * @throws \Exception
     */

    public function updateNumber(string $accountId, string $numberId, array $values)
    {
        $request = $this->updateNumberRequest($accountId, $numberId);

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
     * Create request for operation 'updateNumber'
     *
     * @param string $accountId (required)
     * @param string $numberId
     * @return \GuzzleHttp\Psr7\Request
     */

    private function updateNumberRequest(string $accountId, string $numberId)
    {
        $resourcePath = "/{accountId}/numbers/{id}";

        $resourcePath = str_replace("{accountId}", $accountId, $resourcePath);
        $resourcePath = str_replace("{id}", $numberId, $resourcePath);

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('PATCH', $requestUrl);

        return $request;
    }

    /**
     * Get Number Inbound References
     *
     * @param string $accountId
     * @param string $numberId
     * @return array
     * @throws \Exception
     */

    public function getNumberInboundReferences(string $accountId, string $numberId)
    {
        $request = $this->getNumberInboundReferencesRequest($accountId, $numberId);

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
     * Create request for operation 'getNumberInboundReferences'
     *
     * @param string $accountId (required)
     * @param string $numberId
     * @return \GuzzleHttp\Psr7\Request
     */

    private function getNumberInboundReferencesRequest(string $accountId, string $numberId)
    {
        $resourcePath = "/{accountId}/numbers/{id}/InboundReferences";

        $resourcePath = str_replace("{accountId}", $accountId, $resourcePath);
        $resourcePath = str_replace("{id}", $numberId, $resourcePath);

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('GET', $requestUrl);

        return $request;
    }

    /**
     * Release Non Used Numbers
     *
     * @param string $accountId
     * @return object
     * @throws \Exception
     */

    public function releaseNonUsedNumbers(string $accountId)
    {
        $request = $this->releaseNonUsedNumbersRequest($accountId);

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
     * Create request for operation 'releaseNonUsedNumbers'
     *
     * @param  string $accountId
     * @return \GuzzleHttp\Psr7\Request
     */

    private function releaseNonUsedNumbersRequest(string $accountId)
    {
        $resourcePath = "/{accountId}/numbers/ReleaseNonUsedNumbers";

        $resourcePath = str_replace("{accountId}", $accountId, $resourcePath);

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('DELETE', $requestUrl);

        return $request;
    }

    /**
     * Number add affiliate
     *
     * @param string $accountId
     * @param string $numberId
     * @param string $affiliateId
     * @return object
     * @throws \Exception
     */

    public function numberAddAffiliate(string $accountId, string $numberId, string $affiliateId)
    {
        $request = $this->numberAddAffiliateRequest($accountId, $numberId);

        try {
            $response = $this->client->send($request, [
                'headers' => $this->requestHeaders,
                'json'    => [
                    "affiliateId" => $affiliateId
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
     * Create request for operation 'numberAddAffiliate'
     *
     * @param  string $accountId
     * @param  string $numberId
     * @return \GuzzleHttp\Psr7\Request
     */

    private function numberAddAffiliateRequest(string $accountId, string $numberId)
    {
        $resourcePath = "/{accountId}/numbers/{id}/Affiliate";

        $resourcePath = str_replace("{accountId}", $accountId, $resourcePath);
        $resourcePath = str_replace("{id}", $numberId, $resourcePath);

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('PUT', $requestUrl);

        return $request;
    }

    /**
     * Number remove affiliate
     *
     * @param string $accountId
     * @param string $numberId
     * @param string $affiliateId
     * @return object
     * @throws \Exception
     */

    public function numberRemoveAffiliate(string $accountId, string $numberId, string $affiliateId)
    {
        $request = $this->numberRemoveAffiliateRequest($accountId, $numberId, $affiliateId);

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
     * Create request for operation 'numberRemoveAffiliate'
     *
     * @param  string $accountId
     * @param  string $numberId
     * @param  string $affiliateId
     * @return \GuzzleHttp\Psr7\Request
     */

    private function numberRemoveAffiliateRequest(string $accountId, string $numberId, string $affiliateId)
    {
        $resourcePath = "/{accountId}/numbers/{id}/Affiliate/{affiliateId}";

        $resourcePath = str_replace("{accountId}", $accountId, $resourcePath);
        $resourcePath = str_replace("{id}", $numberId, $resourcePath);
        $resourcePath = str_replace("{affiliateId}", $affiliateId, $resourcePath);

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('DELETE', $requestUrl);

        return $request;
    }
}