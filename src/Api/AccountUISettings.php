<?php
namespace Soltexmedia\Api;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Request;

class AccountUISettings extends RingbaApi {

    /**
     * Get UISettings
     *
     * @param string $accountId
     * @return array
     * @throws \Exception
     */

    public function getUISettings(string $accountId)
    {
        $request = $this->getUISettingsRequest($accountId);

        try {
            $response = $this->client->send($request, ['headers' => $this->requestHeaders]);
        } catch (GuzzleException $e) {
            throw new \Exception($e->getMessage());
        }

        $statusCode = $response->getStatusCode();

        if ($statusCode < 200 || $statusCode > 299) {
            throw new \Exception(sprintf(
                '[%d] Error connecting to the API (%s)',
                $statusCode,
                $request->getUri()
            ));
        }

        $json = $response->getBody()->getContents();
        $data = json_decode($json);
        $data = $data->seettings;

        return $data;
    }

    /**
     * Create request for operation 'getUISettings'
     *
     * @param  string $accountId (required)
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Psr7\Request
     */

    private function getUISettingsRequest(string $accountId)
    {
        $resourcePath = "/{accountId}/UISettings";

        $resourcePath = str_replace("{accountId}", $accountId, $resourcePath);

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('GET', $requestUrl);

        return $request;
    }

    /**
     * Add UISettings  !! API Docs description of Settings values is not provided
     *
     * @param string $accountId
     * @param array $values
     *
     * @return object
     * @throws \Exception
     */

    public function addUISettings(string $accountId, array $values)
    {
        $request = $this->addUISettingsRequest($accountId);

        try {
            $response = $this->client->send($request, [
                'headers' => $this->requestHeaders,
                'json' => $values
            ]);
        } catch (GuzzleException $e) {
            throw new \Exception($e->getMessage());
        }

        $statusCode = $response->getStatusCode();

        if ($statusCode < 200 || $statusCode > 299) {
            throw new \Exception(sprintf(
                '[%d] Error connecting to the API (%s)',
                $statusCode,
                $request->getUri()
            ));
        }

        $json = $response->getBody()->getContents();
        $data = json_decode($json);

        return $data;
    }

    /**
     * Create request for operation 'addUISettings'
     *
     * @param  string $accountId (required)
     * @return \GuzzleHttp\Psr7\Request
     */

    private function addUISettingsRequest(string $accountId)
    {
        $resourcePath = "/{accountId}/UISettings";

        $resourcePath = str_replace("{accountId}", $accountId, $resourcePath);

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('POST', $requestUrl);

        return $request;
    }
}