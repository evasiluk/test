<?php
namespace Soltexmedia\Api;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Request;

class Campaign extends RingbaApi {

    /**
     * Get Campaign offers
     *
     * @param string $accountId
     * @param string $campaignId
     * @return object
     * @throws \Exception
     */

    public function getCampaignOffers(string $accountId, string $campaignId)
    {
        $request = $this->getCampaignOffersRequest($accountId, $campaignId);

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
     * Create request for operation 'getCampaignOffersRequest'
     *
     * @param string $accountId
     * @param string $campaignId
     * @return \GuzzleHttp\Psr7\Request
     */

    private function getCampaignOffersRequest(string $accountId, string $campaignId)
    {
        $resourcePath = "/{accountId}/campaigns/{id}/Offers";

        $resourcePath = str_replace("{accountId}", $accountId, $resourcePath);
        $resourcePath = str_replace("{id}", $campaignId, $resourcePath);

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('GET', $requestUrl);

        return $request;
    }

    /**
     * Delete Campaign offers draft
     *
     * @param string $accountId
     * @param string $campaignId
     * @return object
     * @throws \Exception
     */

    public function deleteCampaignOffersDraft(string $accountId, string $campaignId)
    {
        $request = $this->deleteCampaignOffersDraftRequest($accountId, $campaignId);

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
     * Create request for operation 'deleteCampaignOffersDraftRequest'
     *
     * @param string $accountId
     * @param string $campaignId
     * @return \GuzzleHttp\Psr7\Request
     */

    private function deleteCampaignOffersDraftRequest(string $accountId, string $campaignId)
    {
        $resourcePath = "/{accountId}/campaigns/{id}/Offers/Draft";

        $resourcePath = str_replace("{accountId}", $accountId, $resourcePath);
        $resourcePath = str_replace("{id}", $campaignId, $resourcePath);

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('DELETE', $requestUrl);

        return $request;
    }

    /**
     * Get Campaign offers draft
     *
     * @param string $accountId
     * @param string $campaignId
     * @return object
     * @throws \Exception
     */

    public function getCampaignOffersDraft(string $accountId, string $campaignId)
    {
        $request = $this->getCampaignOffersDraftRequest($accountId, $campaignId);

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
     * Create request for operation 'getCampaignOffersDraftRequest'
     *
     * @param string $accountId
     * @param string $campaignId
     * @return \GuzzleHttp\Psr7\Request
     */

    private function getCampaignOffersDraftRequest(string $accountId, string $campaignId)
    {
        $resourcePath = "/{accountId}/campaigns/{id}/Offers/Draft";

        $resourcePath = str_replace("{accountId}", $accountId, $resourcePath);
        $resourcePath = str_replace("{id}", $campaignId, $resourcePath);

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('GET', $requestUrl);

        return $request;
    }

    /**
     * Add Affiliate to Campaign
     *
     * @param string $accountId
     * @param string $campaignId
     * @param array $values
     * @return object
     * @throws \Exception
     */

    public function addAffiliate(string $accountId, string $campaignId, array $values)
    {
        $request = $this->addAffiliateRequest($accountId, $campaignId);

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
     * Create request for operation 'addAffiliate'
     *
     * @param  string $accountId
     * @param string $campaignId
     * @return \GuzzleHttp\Psr7\Request
     */

    private function addAffiliateRequest(string $accountId, string $campaignId)
    {
        $resourcePath = "/{accountId}/campaigns/{id}/Affiliates";

        $resourcePath = str_replace("{accountId}", $accountId, $resourcePath);
        $resourcePath = str_replace("{id}", $campaignId, $resourcePath);

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('PATCH', $requestUrl);

        return $request;
    }

    /**
     * delete Affiliate from Campaign
     *
     * @param string $accountId
     * @param string $campaignId
     * @param string $affiliateId
     * @param bool $keepOfferNumbers
     * @return object
     * @throws \Exception
     */

    public function deleteAffiliate(string $accountId, string $campaignId, string $affiliateId, bool $keepOfferNumbers = false)
    {
        $request = $this->deleteAffiliateRequest($accountId, $campaignId, $affiliateId);

        try {
            $response = $this->client->send($request, [
                'headers' => $this->requestHeaders,
                'query'    => [
                    "keepOfferNumbers" => $keepOfferNumbers
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
     * Create request for operation 'deleteAffiliate'
     *
     * @param  string $accountId
     * @param string $campaignId
     * @param string $affiliateId
     * @return \GuzzleHttp\Psr7\Request
     */

    private function deleteAffiliateRequest(string $accountId, string $campaignId, string $affiliateId)
    {
        $resourcePath = "/{accountId}/campaigns/{id}/Affiliates/{affiliateId}";

        $resourcePath  = str_replace("{accountId}", $accountId, $resourcePath);
        $resourcePath  = str_replace("{id}", $campaignId, $resourcePath);
        $resourcePath  = str_replace("{affiliateId}", $affiliateId, $resourcePath );

        $requestUrl = $this->config->getHost() . $resourcePath ;
        $request = new Request('DELETE', $requestUrl);

        return $request;
    }

    /**
     * Delete Campaign Call route
     *
     * @param string $accountId
     * @param string $campaignId
     * @param string $routeId
     * @return object
     * @throws \Exception
     */

    public function deleteCallRoute(string $accountId, string $campaignId, string $routeId)
    {
        $request = $this->deleteCallRouteRequest($accountId, $campaignId);

        try {
            $response = $this->client->send($request, [
                'headers' => $this->requestHeaders,
                'json'    => [
                    "id" => $routeId
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
     * Create request for operation 'deleteCallRoute'
     *
     * @param  string $accountId
     * @param string $campaignId
     * @return \GuzzleHttp\Psr7\Request
     */

    private function deleteCallRouteRequest(string $accountId, string $campaignId)
    {
        $resourcePath = "/{accountId}/campaigns/{id}/Routes";

        $resourcePath = str_replace("{accountId}", $accountId, $resourcePath);
        $resourcePath = str_replace("{id}", $campaignId, $resourcePath);

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('DELETE', $requestUrl);

        return $request;
    }

    /**
     * Add Campaign Call route
     *
     * @param string $accountId
     * @param string $campaignId
     * @param array $values
     * @return object
     * @throws \Exception
     */

    public function addCallRoute(string $accountId, string $campaignId, array $values)
    {
        $request = $this->addCallRouteRequest($accountId, $campaignId);

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
     * Create request for operation 'addCallRoute'
     *
     * @param  string $accountId
     * @param string $campaignId
     * @return \GuzzleHttp\Psr7\Request
     */

    private function addCallRouteRequest(string $accountId, string $campaignId)
    {
        $resourcePath = "/{accountId}/campaigns/{id}/Routes";

        $resourcePath = str_replace("{accountId}", $accountId, $resourcePath);
        $resourcePath = str_replace("{id}", $campaignId, $resourcePath);

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('POST', $requestUrl);

        return $request;
    }

    /**
     * Get Campaigns
     *
     * @param string $accountId
     * @return object
     * @throws \Exception
     */

    public function getCampaigns(string $accountId)
    {
        $request = $this->getCampaignsRequest($accountId);

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
     * Create request for operation 'getCampaigns'
     *
     * @param  string $accountId
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Psr7\Request
     */

    private function getCampaignsRequest(string $accountId)
    {
        $resourcePath = "/{accountId}/campaigns";

        $resourcePath = str_replace("{accountId}", $accountId, $resourcePath);

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('GET', $requestUrl);

        return $request;
    }

    /**
     * Add Campaign
     *
     * @param string $accountId
     * @param array $values
     * @return object
     * @throws \Exception
     */

    public function addCampaign(string $accountId, array $values)
    {
        $request = $this->addCampaignRequest($accountId);

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
     * Create request for operation 'addCampaign'
     *
     * @param  string $accountId
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Psr7\Request
     */

    private function addCampaignRequest(string $accountId)
    {
        $resourcePath = "/{accountId}/campaigns";

        $resourcePath = str_replace("{accountId}", $accountId, $resourcePath);

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('POST', $requestUrl);

        return $request;
    }

    /**
     * Delete Campaign
     *
     * @param string $accountId
     * @param string $campaignId
     * @return object
     * @throws \Exception
     */

    public function deleteCampaign(string $accountId, string $campaignId)
    {
        $request = $this->deleteCampaignRequest($accountId, $campaignId);

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
     * Create request for operation 'deleteCampaign'
     *
     * @param  string $accountId
     * @param string $campaignId
     * @return \GuzzleHttp\Psr7\Request
     */

    private function deleteCampaignRequest(string $accountId, string $campaignId)
    {
        $resourcePath = "/{accountId}/campaigns/{id}";

        $resourcePath = str_replace("{accountId}", $accountId, $resourcePath);
        $resourcePath = str_replace("{id}", $campaignId, $resourcePath);

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('DELETE', $requestUrl);

        return $request;
    }

    /**
     * Get Campaign
     *
     * @param string $accountId
     * @param string $campaignId
     * @return object
     * @throws \Exception
     */

    public function getCampaign(string $accountId, string $campaignId)
    {
        $request = $this->getCampaignRequest($accountId, $campaignId);

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
     * Create request for operation 'getCampaign'
     *
     * @param  string $accountId
     * @param string $campaignId
     * @return \GuzzleHttp\Psr7\Request
     */

    private function getCampaignRequest(string $accountId, string $campaignId)
    {
        $resourcePath = "/{accountId}/campaigns/{id}";

        $resourcePath = str_replace("{accountId}", $accountId, $resourcePath);
        $resourcePath = str_replace("{id}", $campaignId, $resourcePath);

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('GET', $requestUrl);

        return $request;
    }

    /**
     * Update Campaign
     *
     * @param string $accountId
     * @param string $campaignId
     * @param array $values
     * @return object
     * @throws \Exception
     */

    public function updateCampaign(string $accountId, string $campaignId, array $values)
    {
        $request = $this->updateCampaignRequest($accountId, $campaignId);

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
     * Create request for operation 'updateCampaign'
     *
     * @param  string $accountId
     * @param string $campaignId
     * @return \GuzzleHttp\Psr7\Request
     */

    private function updateCampaignRequest(string $accountId, string $campaignId)
    {
        $resourcePath = "/{accountId}/campaigns/{id}";

        $resourcePath = str_replace("{accountId}", $accountId, $resourcePath);
        $resourcePath = str_replace("{id}", $campaignId, $resourcePath);

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('PATCH', $requestUrl);

        return $request;
    }

    /**
     * Get Campaigns Stats
     *
     * @param string $accountId
     * @return object
     * @throws \Exception
     */

    public function getCampaignsStats(string $accountId)
    {
        $request = $this->getCampaignsStatsRequest($accountId);

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
     * Create request for operation 'getCampaignsStats'
     *
     * @param  string $accountId
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Psr7\Request
     */

    private function getCampaignsStatsRequest(string $accountId)
    {
        $resourcePath = "/{accountId}/campaigns/stats";

        $resourcePath = str_replace("{accountId}", $accountId, $resourcePath);

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('GET', $requestUrl);

        return $request;
    }

    /**
     * Clone Campaign
     *
     * @param string $accountId
     * @param string $campaignId
     * @return object
     * @throws \Exception
     */

    public function cloneCampaign(string $accountId, string $campaignId)
    {
        $request = $this->cloneCampaignRequest($accountId, $campaignId);

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
     * Create request for operation 'cloneCampaign'
     *
     * @param  string $accountId
     * @param string $campaignId
     * @return \GuzzleHttp\Psr7\Request
     */

    private function cloneCampaignRequest(string $accountId, string $campaignId)
    {
        $resourcePath = "/{accountId}/campaigns/{id}/clone";

        $resourcePath = str_replace("{accountId}", $accountId, $resourcePath);
        $resourcePath = str_replace("{id}", $campaignId, $resourcePath);

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('POST', $requestUrl);

        return $request;
    }

    /**
     * Link to Campaign
     *
     * @param string $accountId
     * @param string $campaignId
     * @param array $values
     * @return object
     * @throws \Exception
     */

    public function linkToCampaign(string $accountId, string $campaignId, array $values)
    {
        $request = $this->linkToCampaignRequest($accountId, $campaignId);

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
     * Create request for operation 'linkToCampaign'
     *
     * @param  string $accountId
     * @param string $campaignId
     * @return \GuzzleHttp\Psr7\Request
     */

    private function linkToCampaignRequest(string $accountId, string $campaignId)
    {
        $resourcePath = "/{accountId}/campaigns/{id}/Link";

        $resourcePath = str_replace("{accountId}", $accountId, $resourcePath);
        $resourcePath = str_replace("{id}", $campaignId, $resourcePath);

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('PATCH', $requestUrl);

        return $request;
    }

    /**
     * UnLink from Campaign
     *
     * @param string $accountId
     * @param string $campaignId
     * @param array $values
     * @return object
     * @throws \Exception
     */

    public function unLinkFromCampaign(string $accountId, string $campaignId, array $values)
    {
        $request = $this->unLinkFromCampaignRequest($accountId, $campaignId);

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
     * Create request for operation 'UnlinkToCampaign'
     *
     * @param  string $accountId
     * @param string $campaignId
     * @return \GuzzleHttp\Psr7\Request
     */

    private function unLinkFromCampaignRequest(string $accountId, string $campaignId)
    {
        $resourcePath = "/{accountId}/campaigns/{id}/UnLink";

        $resourcePath = str_replace("{accountId}", $accountId, $resourcePath);
        $resourcePath = str_replace("{id}", $campaignId, $resourcePath);

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('PATCH', $requestUrl);

        return $request;
    }

}