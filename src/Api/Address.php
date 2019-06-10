<?php
namespace Soltexmedia\Api;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Request;

class Address extends RingbaApi {

    /**
     * Get Addresses
     *
     * @param string $accountId
     * @return array
     * @throws \Exception
     */

    public function getAddresses(string $accountId)
    {
        $request = $this->getAddressesRequest($accountId);

        try {
            $response = $this->client->send($request, ['headers' => $this->requestHeaders]);
        } catch (GuzzleException $e) {
            throw new \Exception($e->getMessage());
        }

        $statusCode = $response->getStatusCode();
        $this->checkStatusCodeIsGreen($statusCode, $request);

        $json = $response->getBody()->getContents();
        $data = json_decode($json);
        $data = $data->addresses;

        return $data;
    }

    /**
     * Create request for operation 'getAddresses'
     *
     * @param  string $accountId
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Psr7\Request
     */

    private function getAddressesRequest(string $accountId)
    {
        $resourcePath = "/{accountid}/addresses";

        $resourcePath = str_replace("{accountid}", $accountId, $resourcePath);

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('GET', $requestUrl);

        return $request;
    }

    /**
     * Add Address
     *
     * @param string $accountId
     * @param array $values
     *
     * @return object
     * @throws \Exception
     */

    public function addAddress(string $accountId, array $values)
    {
        if(empty($values["countryCode"])) {
            throw new \Exception("countryCode value is required");
        }
        $request = $this->addAddressRequest($accountId);

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
     * Create request for operation 'addAddress'
     *
     * @param  string $accountId
     * @return \GuzzleHttp\Psr7\Request
     */

    private function addAddressRequest(string $accountId)
    {
        $resourcePath = "/{accountid}/addresses";

        $resourcePath = str_replace("{accountid}", $accountId, $resourcePath);

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('POST', $requestUrl);

        return $request;
    }

    /**
     * Delete Address
     *
     * @param string $accountId
     * @param string $addressId
     *
     * @return boolean
     * @throws \Exception
     */

    public function deleteAddress(string $accountId, string $addressId)
    {
        $request = $this->deleteAddressRequest($accountId, $addressId);

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
     * Create request for operation 'deleteAddress'
     *
     * @param  string $accountId
     * @param  string $addressId
     * @return \GuzzleHttp\Psr7\Request
     */

    private function deleteAddressRequest(string $accountId, string $addressId)
    {
        $resourcePath = "/{accountid}/addresses/{id}";

        $resourcePath = str_replace("{accountid}", $accountId, $resourcePath);
        $resourcePath = str_replace("{id}", $addressId, $resourcePath);

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('DELETE', $requestUrl);

        return $request;
    }

    /**
     * Get Address
     *
     * @param string $accountId
     * @param string $addressId
     * @return \stdClass object
     * @throws \Exception
     */

    public function getAddress(string $accountId, string $addressId)
    {
        $request = $this->getAddressRequest($accountId, $addressId);

        try {
            $response = $this->client->send($request, ['headers' => $this->requestHeaders]);
        } catch (GuzzleException $e) {
            throw new \Exception($e->getMessage());
        }

        $statusCode = $response->getStatusCode();
        $this->checkStatusCodeIsGreen($statusCode, $request);

        $json = $response->getBody()->getContents();
        $data = json_decode($json);
        $data = $data->address;

        return $data;
    }

    /**
     * Create request for operation 'getAddress'
     *
     * @param  string $accountId
     * @param  string $addressId
     * @return \GuzzleHttp\Psr7\Request
     */

    private function getAddressRequest(string $accountId, string $addressId)
    {
        $resourcePath = "/{accountid}/addresses/{id}";

        $resourcePath = str_replace("{accountid}", $accountId, $resourcePath);
        $resourcePath = str_replace("{id}", $addressId, $resourcePath);

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('GET', $requestUrl);

        return $request;
    }

    /**
     * Update Address
     *
     * @param string $accountId
     * @param string $addressId
     * @param array $values
     *
     * @return object
     * @throws \Exception
     */

    public function updateAddress(string $accountId, string $addressId, array $values)
    {
        $request = $this->updateAddressRequest($accountId, $addressId);

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
        $data = $data->address;

        return $data;
    }

    /**
     * Create request for operation 'updateAddress'
     *
     * @param  string $accountId
     * @param  string $addressId
     * @return \GuzzleHttp\Psr7\Request
     */

    private function updateAddressRequest(string $accountId, string $addressId)
    {
        $resourcePath = "/{accountid}/addresses/{id}";

        $resourcePath = str_replace("{accountid}", $accountId, $resourcePath);
        $resourcePath = str_replace("{id}", $addressId, $resourcePath);

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('PATCH', $requestUrl);

        return $request;
    }

    /**
     * Set Address as Default
     *
     * @param string $accountId
     * @param string $addressId
     *
     * @return boolean
     * @throws \Exception
     */

    public function setDefault(string $accountId, string $addressId)
    {
        $request = $this->setDefaultRequest($accountId, $addressId);

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
     * Create request for operation 'setDefault'
     *
     * @param  string $accountId
     * @param  string $addressId
     * @return \GuzzleHttp\Psr7\Request
     */

    private function setDefaultRequest(string $accountId, string $addressId)
    {
        $resourcePath = "/{accountid}/addresses/{id}/SetDefault";

        $resourcePath = str_replace("{accountid}", $accountId, $resourcePath);
        $resourcePath = str_replace("{id}", $addressId, $resourcePath);

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('POST', $requestUrl);

        return $request;
    }

    /**
     * Get Countries
     *
     * @param string $accountId
     * @param bool $includeNoVoice
     * @param bool $inlcludeMobile
     * @return array
     * @throws \Exception
     */

    public function getCountries(string $accountId, $includeNoVoice = false, $inlcludeMobile = false)
    {
        $request = $this->getCountriesRequest($accountId);

        try {
            $response = $this->client->send($request, [
                'headers' => $this->requestHeaders,
                'query'   => [
                    "includeNoVoice"   => $includeNoVoice,
                    "includeMobile"    => $inlcludeMobile,
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
     * Create request for operation 'getCountries'
     *
     * @param  string $accountId
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Psr7\Request
     */

    private function getCountriesRequest(string $accountId)
    {
        $resourcePath = "/{accountid}/addresses/countries";

        $resourcePath = str_replace("{accountid}", $accountId, $resourcePath);

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('GET', $requestUrl);

        return $request;
    }

    /**
     * Get Requirements
     *
     * @param string $accountId
     * @param string $countryCode
     * @return array
     * @throws \Exception
     */

    public function getRequirements(string $accountId, string $countryCode)
    {
        $request = $this->getRequirementsRequest($accountId, $countryCode);

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
     * Create request for operation 'getRequirements'
     *
     * @param string $accountId
     * @param string $countryCode
     * @return \GuzzleHttp\Psr7\Request
     */

    private function getRequirementsRequest(string $accountId, string $countryCode)
    {
        $resourcePath = "/{accountid}/addresses/requirements/{countryCode}";

        $resourcePath = str_replace("{accountid}", $accountId, $resourcePath);
        $resourcePath = str_replace("{countryCode}", $countryCode, $resourcePath);

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('GET', $requestUrl);

        return $request;
    }
}