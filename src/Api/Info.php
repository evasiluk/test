<?php
namespace Soltexmedia\Api;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Request;

class Info extends RingbaApi {

    /**
     * is Number
     *
     * @param string $number
     * @return object
     * @throws \Exception
     */

    public function isNumber(string $number)
    {
        $request = $this->isNumberRequest();

        try {
            $response = $this->client->send($request, [
                'headers' => $this->requestHeaders,
                'query' => [
                    'number' => $number
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
     * Create request for operation 'isNumber'
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Psr7\Request
     */

    private function isNumberRequest()
    {
        $resourcePath = "/info/isNumber";

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('GET', $requestUrl);

        return $request;
    }

    /**
     * get Timezones
     *
     * @return array
     * @throws \Exception
     */

    public function getTimezones()
    {
        $request = $this->getTimezonesRequest();

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
     * Create request for operation 'getTimezones'
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Psr7\Request
     */

    private function getTimezonesRequest()
    {
        $resourcePath = "/info/timezones";

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('GET', $requestUrl);

        return $request;
    }

    /**
     * Get Offer Categories
     *
     * @param string $accountId
     * @return object
     * @throws \Exception
     */

    public function getOfferCategories(string $accountId)
    {
        $request = $this->getOfferCategoriesRequest($accountId);

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
     * Create request for operation 'getOfferCategories'
     *
     * @param  string $accountId
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Psr7\Request
     */

    private function getOfferCategoriesRequest(string $accountId)
    {
        $resourcePath = "/{accountId}/info/offerCategories";

        $resourcePath = str_replace("{accountId}", $accountId, $resourcePath);

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('GET', $requestUrl);

        return $request;
    }

    /**
     * get Countries
     *
     * @return array
     * @throws \Exception
     */

    public function getCountries()
    {
        $request = $this->getCountriesRequest();

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
     * Create request for operation 'getCountries'
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Psr7\Request
     */

    private function getCountriesRequest()
    {
        $resourcePath = "/info/countries";

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('GET', $requestUrl);

        return $request;
    }

    /**
     * get Languages
     *
     * @return array
     * @throws \Exception
     */

    public function getLanguages()
    {
        $request = $this->getLanguagesRequest();

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
     * Create request for operation 'getLanguages'
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Psr7\Request
     */

    private function getLanguagesRequest()
    {
        $resourcePath = "/info/languages";

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('GET', $requestUrl);

        return $request;
    }

    /**
     * get Plans
     *
     * @return array
     * @throws \Exception
     */

    public function getPlans()
    {
        $request = $this->getPlansRequest();

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
     * Create request for operation 'getPlans'
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Psr7\Request
     */

    private function getPlansRequest()
    {
        $resourcePath = "/info/Plans";

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('GET', $requestUrl);

        return $request;
    }

    /**
     * get Conversion settings
     *
     * @return array
     * @throws \Exception
     */

    public function getConversionSettings()
    {
        $request = $this->getConversionSettingsRequest();

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
     * Create request for operation 'getConversionSettings'
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Psr7\Request
     */

    private function getConversionSettingsRequest()
    {
        $resourcePath = "/info/conversionSettings";

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('GET', $requestUrl);

        return $request;
    }

}
