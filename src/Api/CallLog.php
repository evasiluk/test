<?php
namespace Soltexmedia\Api;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Request;

class CallLog extends RingbaApi {

    /**
     * Get Tag types
     *
     * @param string $accountId
     * @return object
     * @throws \Exception
     */

    public function getTagTypes(string $accountId)
    {
        $request = $this->getTagTypesRequest($accountId);

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
     * Create request for operation 'getTagTypes'
     *
     * @param  string $accountId
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Psr7\Request
     */

    private function getTagTypesRequest($accountId)
    {
        $resourcePath = "/{accountId}/CallLogs/Tags";

        $resourcePath = str_replace("{accountId}", $accountId, $resourcePath);

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('GET', $requestUrl);

        return $request;
    }

    /**
     * Get Tag names
     *
     * @param string $accountId
     * @param string $type
     * @throws \Exception
     * @return object
     */

    public function getTagNames(string $accountId, string $type)
    {
        $request = $this->getTagNamesRequest($accountId, $type);

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
     * Create request for operation 'getTagNames'
     *
     * @param string $accountId
     * @param string $type
     * @return \GuzzleHttp\Psr7\Request
     */

    private function getTagNamesRequest(string $accountId, string $type)
    {
        $resourcePath = "/{accountId}/CallLogs/Tags/{type}";

        $resourcePath = str_replace("{accountId}", $accountId, $resourcePath);
        $resourcePath = str_replace("{type}", $type, $resourcePath);

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('GET', $requestUrl);

        return $request;
    }

    /**
     * Get Tag values
     *
     * @param $accountId
     * @param $type
     * @param $name
     * @param string $val
     * @return object
     * @throws \Exception
     */

    public function getTagValues($accountId, $type, $name, $val = "")
    {
        $request = $this->getTagValuesRequest($accountId, $type, $name);

        try {
            $response = $this->client->send($request, [
                'headers' => $this->requestHeaders,
                'query'   => [
                    "val" => $val
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
     * Create request for operation 'getTagValues'
     *
     * @param string $accountId
     * @param string $type
     * @param string $name
     * @return \GuzzleHttp\Psr7\Request
     */

    private function getTagValuesRequest(string $accountId, string $type, string $name)
    {
        $resourcePath = "/{accountId}/CallLogs/Tags/{type}/{name}/Values";

        $resourcePath = str_replace("{accountId}", $accountId, $resourcePath);
        $resourcePath = str_replace("{type}", $type, $resourcePath);
        $resourcePath = str_replace("{name}", $name, $resourcePath);

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('GET', $requestUrl);

        return $request;
    }

    /**
     * Get Search fields
     *
     * @param string $accountId
     * @throws \Exception
     * @return object
     */

    public function getSearchFields(string $accountId)
    {
        $request = $this->getSearchFieldsRequest($accountId);

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
     * Create request for operation 'getSearchFields'
     *
     * @param  string $accountId
     * @return \GuzzleHttp\Psr7\Request
     */

    private function getSearchFieldsRequest(string $accountId)
    {
        $resourcePath = "/{accountId}/CallLogs/SearchFields";

        $resourcePath = str_replace("{accountId}", $accountId, $resourcePath);

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('GET', $requestUrl);

        return $request;
    }

    /**
     * Get Search field
     *
     * @param string $accountId
     * @param string $fieldName
     * @return object
     * @throws \Exception
     */

    public function getSearchField(string $accountId, string $fieldName)
    {
        $request = $this->getSearchFieldRequest($accountId, $fieldName);

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
     * Create request for operation 'getSearchField'
     *
     * @param string $accountId
     * @param string $fieldName
     * @return \GuzzleHttp\Psr7\Request
     */

    private function getSearchFieldRequest(string $accountId, string $fieldName)
    {
        $resourcePath = "/{accountId}/CallLogs/SearchFields/{fieldName}";

        $resourcePath = str_replace("{accountId}", $accountId, $resourcePath);
        $resourcePath = str_replace("{fieldName}", $fieldName, $resourcePath);

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('GET', $requestUrl);

        return $request;
    }

    /**
     * Get Search field values
     *
     * @param string $accountId
     * @param string $fieldName
     * @param string $val
     * @return object
     * @throws \Exception
     */

    public function getSearchFieldValues(string $accountId, string $fieldName, string $val = "")
    {
        $request = $this->getSearchFieldValuesRequest($accountId, $fieldName);

        try {
            $response = $this->client->send($request, [
                'headers' => $this->requestHeaders,
                'query'   => [
                    'val' => $val
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
     * Create request for operation 'getSearchFieldValues'
     *
     * @param string $accountId
     * @param string $fieldName
     * @return \GuzzleHttp\Psr7\Request
     */

    private function getSearchFieldValuesRequest(string $accountId, string $fieldName)
    {
        $resourcePath = "/{accountId}/CallLogs/SearchFields/{fieldName}/Values";

        $resourcePath = str_replace("{accountId}", $accountId, $resourcePath);
        $resourcePath = str_replace("{fieldName}", $fieldName, $resourcePath);

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('GET', $requestUrl);

        return $request;
    }

    /**
     * Get Events
     *
     * @param string $accountId
     * @return object
     * @throws \Exception
     */

    public function getEvents(string $accountId)
    {
        $request = $this->getEventsRequest($accountId);

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
     * Create request for operation 'getEvents'
     *
     * @param  string $accountId
     * @return \GuzzleHttp\Psr7\Request
     */

    private function getEventsRequest(string $accountId)
    {
        $resourcePath = "/{accountId}/CallLogs/Events";

        $resourcePath = str_replace("{accountId}", $accountId, $resourcePath);

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('GET', $requestUrl);

        return $request;
    }

    /**
     * Get Available Group Bys
     *
     * @param string $accountId
     * @return object
     * @throws \Exception
     */

    public function getAvailableGroupBys(string $accountId)
    {
        $request = $this->getAvailableGroupBysRequest($accountId);

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
     * Create request for operation 'getAvailableGroupBys'
     *
     * @param  string $accountId
     * @return \GuzzleHttp\Psr7\Request
     */

    private function getAvailableGroupBysRequest(string $accountId)
    {
        $resourcePath = "/{accountId}/CallLogs/AvailableGroupBys";

        $resourcePath = str_replace("{accountId}", $accountId, $resourcePath);

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('GET', $requestUrl);

        return $request;
    }

    /**
     * Get Export progress
     *
     * @param string $accountId
     * @param string $jobId
     * @return object
     * @throws \Exception
     */

    public function getExportProgress(string $accountId, string $jobId)
    {
        $request = $this->getExportProgressRequest($accountId, $jobId);

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
     * Create request for operation 'getExportProgress'
     *
     * @param string $accountId (required)
     * @param string $jobId
     * @return \GuzzleHttp\Psr7\Request
     */

    private function getExportProgressRequest(string $accountId, string $jobId)
    {
        $resourcePath = "/{accountId}/CallLogs/Date/Export/{jobId}";

        $resourcePath = str_replace("{accountId}", $accountId, $resourcePath);
        $resourcePath = str_replace("{jobId}", $jobId, $resourcePath);

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('GET', $requestUrl);

        return $request;
    }

    /**
     * Get Logs by date
     *
     * @param string $accountId
     * @param array $values
     * @return object
     * @throws \Exception
     */

    public function getLogsByDate(string $accountId, array $values)
    {
        $request = $this->getLogsByDateRequest($accountId);

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
     * Create request for operation 'getLogsByDate'
     *
     * @param string $accountId
     * @return \GuzzleHttp\Psr7\Request
     */

    private function getLogsByDateRequest(string $accountId)
    {
        $resourcePath = "/{accountId}/CallLogs/Date";

        $resourcePath = str_replace("{accountId}", $accountId, $resourcePath);

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('POST', $requestUrl);

        return $request;
    }
}