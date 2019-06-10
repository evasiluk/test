<?php
namespace Soltexmedia\Api;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Request;

class Stats extends RingbaApi {

    /**
     * Get Stats live
     *
     * @param string $accountId
     * @return object
     * @throws \Exception
     */

    public function getStatsLive(string $accountId)
    {
        $request = $this->getStatsLiveRequest($accountId);

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
     * Create request for operation 'getStatsLive'
     *
     * @param string $accountId
     * @return \GuzzleHttp\Psr7\Request
     */

    private function getStatsLiveRequest(string $accountId)
    {
        $resourcePath = "/{accountId}/stats/live";

        $resourcePath = str_replace("{accountId}", $accountId, $resourcePath);

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('GET', $requestUrl);

        return $request;
    }

    /**
     * Get Stats live publisher
     *
     * @param string $accountId
     * @param string $affiliateId
     * @return object
     * @throws \Exception
     */

    public function getStatsLivePublisher(string $accountId, string $affiliateId)
    {
        $request = $this->getStatsLivePublisherRequest($accountId, $affiliateId);

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
     * Create request for operation 'getStatsLivePublisher'
     *
     * @param string $accountId
     * @param string $affiliateId
     * @return \GuzzleHttp\Psr7\Request
     */

    private function getStatsLivePublisherRequest(string $accountId, string $affiliateId)
    {
        $resourcePath = "/{accountId}/stats/live/publisher/{affiliateId}";

        $resourcePath = str_replace("{accountId}", $accountId, $resourcePath);
        $resourcePath = str_replace("{affiliateId}", $affiliateId, $resourcePath);

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('GET', $requestUrl);

        return $request;
    }

    /**
     * Get Stats live Campaign
     *
     * @param string $accountId
     * @param string $campaignId
     * @return object
     * @throws \Exception
     */

    public function getStatsLiveCampaign(string $accountId, string $campaignId)
    {
        $request = $this->getStatsLiveCampaignRequest($accountId, $campaignId);

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
     * Create request for operation 'getStatsLiveCampaign'
     *
     * @param string $accountId
     * @param string $campaignId
     * @return \GuzzleHttp\Psr7\Request
     */

    private function getStatsLiveCampaignRequest(string $accountId, string $campaignId)
    {
        $resourcePath = "/{accountId}/stats/live/campaign/{campaignId}";

        $resourcePath = str_replace("{accountId}", $accountId, $resourcePath);
        $resourcePath = str_replace("{campaignId}", $campaignId, $resourcePath);

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('GET', $requestUrl);

        return $request;
    }

    /**
     * Get Stats
     *
     * @param string $accountId
     * @return object
     * @throws \Exception
     */

    public function getStats(string $accountId)
    {
        $request = $this->getStatsRequest($accountId);

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
     * Create request for operation 'getStats'
     *
     * @param string $accountId
     * @return \GuzzleHttp\Psr7\Request
     */

    private function getStatsRequest(string $accountId)
    {
        $resourcePath = "/{accountId}/stats";

        $resourcePath = str_replace("{accountId}", $accountId, $resourcePath);

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('GET', $requestUrl);

        return $request;
    }

    /**
     * Get Stats by day
     *
     * @param string $accountId
     * @param int $past
     * @param int $days
     * @param string $type
     * @param string $id
     * @return object
     * @throws \Exception
     */

    public function getStatsByDay(string $accountId, int $past = 0, int $days = 0, string $type = "", string $id = "")
    {
        $request = $this->getStatsByDayRequest($accountId);

        try {
            $response = $this->client->send($request, [
                'headers' => $this->requestHeaders,
                'query'   => [
                    "past"   => ($past > 0)? $past : null,
                    "days"   => ($days > 0)? $days : null,
                    "type"   => strlen($type)? $type : null,
                    "id"     => strlen($id)? $id : null,
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
     * Create request for operation 'getStatsByDay'
     *
     * @param $accountId
     * @return \GuzzleHttp\Psr7\Request
     */

    private function getStatsByDayRequest($accountId)
    {
        $resourcePath = "/{accountId}/stats/byDay";

        $resourcePath = str_replace("{accountId}", $accountId, $resourcePath);

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('GET', $requestUrl);

        return $request;
    }

    /**
     * Get Top by day
     *
     * @param string $accountId
     * @param int $past
     * @param int $days
     * @return object
     * @throws \Exception
     */

    public function getStatsTopByDay(string $accountId, int $past = 0, int $days = 0)
    {
        $request = $this->getStatsTopByDayRequest($accountId);

        try {
            $response = $this->client->send($request, [
                'headers' => $this->requestHeaders,
                'query'   => [
                    "past"   => ($past > 0)? $past : null,
                    "days"       => ($days > 0)? $days : null,
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
     * Create request for operation 'getStatsTopByDay'
     *
     * @param string $accountId
     * @return \GuzzleHttp\Psr7\Request
     */

    private function getStatsTopByDayRequest(string $accountId)
    {
        $resourcePath = "/{accountId}/stats/TopByDay";

        $resourcePath = str_replace("{accountId}", $accountId, $resourcePath);

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('GET', $requestUrl);

        return $request;
    }

    /**
     * Get Top by day
     *
     * @param string $accountId
     * @param int $hours
     * @return object
     * @throws \Exception
     */

    public function getStatsTopByHour(string $accountId, int $hours = 0)
    {
        $request = $this->getStatsTopByHourRequest($accountId);

        try {
            $response = $this->client->send($request, [
                'headers' => $this->requestHeaders,
                'query'   => [
                    "hours"   => ($hours > 0)? $hours : null,
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
     * Create request for operation 'getStatsTopByHour'
     *
     * @param string $accountId
     * @return \GuzzleHttp\Psr7\Request
     */

    private function getStatsTopByHourRequest(string $accountId)
    {
        $resourcePath = "/{accountId}/stats/TopByHour";

        $resourcePath = str_replace("{accountId}", $accountId, $resourcePath);

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('GET', $requestUrl);

        return $request;
    }

    /**
     * Get Stats by day
     *
     * @param string $accountId
     * @param int $past
     * @param int $days
     * @param string $type
     * @param string $id
     * @return object
     * @throws \Exception
     */

    public function getStatsSum(string $accountId, int $past = 0, int $days = 0, string $type = "", string $id = "")
    {
        $request = $this->getStatsSumRequest($accountId);

        try {
            $response = $this->client->send($request, [
                'headers' => $this->requestHeaders,
                'query'   => [
                    "past"   => ($past > 0)? $past : null,
                    "days"       => ($days > 0)? $days : null,
                    "type" => strlen($type)? $type : null,
                    "id"     => strlen($id)? $id : null,
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
     * Create request for operation 'getStatsSum'
     *
     * @param string $accountId
     * @return \GuzzleHttp\Psr7\Request
     */

    private function getStatsSumRequest(string $accountId)
    {
        $resourcePath = "/{accountId}/stats/Sum";

        $resourcePath = str_replace("{accountId}", $accountId, $resourcePath);

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('GET', $requestUrl);

        return $request;
    }

    /**
     * Get Stats all Campaigns
     *
     * @param string $accountId
     * @return object
     * @throws \Exception
     */

    public function getStatsAllCampaigns(string $accountId)
    {
        $request = $this->getStatsAllCampaignsRequest($accountId);

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
     * Create request for operation 'getStatsAllCampaigns'
     *
     * @param string $accountId
     * @return \GuzzleHttp\Psr7\Request
     */

    private function getStatsAllCampaignsRequest(string $accountId)
    {
        $resourcePath = "/{accountId}/stats/allCampaigns";

        $resourcePath = str_replace("{accountId}", $accountId, $resourcePath);

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('GET', $requestUrl);

        return $request;
    }

}