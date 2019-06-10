<?php
namespace Soltexmedia\Api;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Request;

class Billing extends RingbaApi{

    /**
     * Get Billing info
     *
     * @param string $accountId
     * @return \stdClass object
     * @throws \Exception
     */

    public function getBilling(string $accountId)
    {
        $request = $this->getBillingRequest($accountId);

        try {
            $response = $this->client->send($request, ['headers' => $this->requestHeaders]);
        } catch (GuzzleException $e) {
            throw new \Exception($e->getMessage());
        }

        $statusCode = $response->getStatusCode();
        $this->checkStatusCodeIsGreen($statusCode, $request);

        $json = $response->getBody()->getContents();
        $data = json_decode($json);
        $data = $data->billing;

        return $data;
    }


    /**
     * Create request for operation 'getBilling'
     *
     * @param  string $accountId
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Psr7\Request
     */

    private function getBillingRequest(string $accountId)
    {
        $resourcePath = "/{accountid}/Billing";

        $resourcePath = str_replace("{accountid}", $accountId, $resourcePath);

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('GET', $requestUrl);

        return $request;
    }

    /**
     * Disable Account
     *
     * @param string $accountId
     * @return \stdClass object
     * @throws \Exception
     */

    public function disableAccount(string $accountId)
    {
        $request = $this->disableAccountRequest($accountId);

        try {
            $response = $this->client->send($request, [
                'headers' => $this->requestHeaders,
                'json' => [
                    "confirmed" => true
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
     * Create request for operation 'disableAccount'
     *
     * @param  string $accountId
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Psr7\Request
     */

    private function disableAccountRequest(string $accountId)
    {
        $resourcePath = "/{accountid}/Billing/Disable";

        $resourcePath = str_replace("{accountid}", $accountId, $resourcePath);

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('DELETE', $requestUrl);

        return $request;
    }

    /**
     * Enable Account
     *
     * @param string $accountId
     * @return \stdClass object
     * @throws \Exception
     */

    public function enableAccount(string $accountId)
    {
        $request = $this->enableAccountRequest($accountId);

        try {
            $response = $this->client->send($request, [
                'headers' => $this->requestHeaders,
                'json' => [
                    "confirmed" => true
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
     * Create request for operation 'enableAccount'
     *
     * @param  string $accountId
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Psr7\Request
     */

    private function enableAccountRequest(string $accountId)
    {
        $resourcePath = "/{accountid}/Billing/Enable";

        $resourcePath = str_replace("{accountid}", $accountId, $resourcePath);

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('PUT', $requestUrl);

        return $request;
    }

    /**
     * Get Billing Settings
     *
     * @param string $accountId
     * @return mixed
     * @throws \Exception
     */
    public function getBillingSettings(string $accountId)
    {
        $request = $this->getBillingSettingsRequest($accountId);

        try {
            $response = $this->client->send($request, ['headers' => $this->requestHeaders]);
        } catch (GuzzleException $e) {
            throw new \Exception($e->getMessage());
        }

        $statusCode = $response->getStatusCode();
        $this->checkStatusCodeIsGreen($statusCode, $request);

        $json = $response->getBody()->getContents();
        $data = json_decode($json);

        $data = $data->billingSettings;

        return $data;
    }

    /**
     * Create request for operation 'getBillingSettings'
     *
     * @param string $accountId
     * @throws \InvalidArgumentException
     *
     * @return Request
     */
    private function getBillingSettingsRequest(string $accountId)
    {
        $resourcePath = "/{accountid}/Billing/BillingSettings";

        $resourcePath = str_replace("{accountid}", $accountId, $resourcePath);

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('GET', $requestUrl);

        return $request;
    }

    /**
     * Update Billing Settings
     *
     * @param string $accountId
     * @param array $values
     * @return mixed
     * @throws \Exception
     */
    public function updateBillingSettings(string $accountId, array $values)
    {
        $request = $this->updateBillingSettingsRequest($accountId);

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
     * Create request for operation 'updateBillingSettings'
     *
     * @param string $accountId
     * @throws \InvalidArgumentException
     *
     * @return Request
     */

    private function updateBillingSettingsRequest(string $accountId)
    {
        $resourcePath = "/{accountid}/Billing/BillingSettings";

        $resourcePath = str_replace("{accountid}", $accountId, $resourcePath);

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('PUT', $requestUrl);

        return $request;
    }

    /**
     * Get Account balance
     *
     * @param string $accountId
     * @return float
     * @throws \Exception
     */

    public function getBalance(string $accountId)
    {
        $request = $this->getBalanceRequest($accountId);

        try {
            $response = $this->client->send($request, ['headers' => $this->requestHeaders]);
        } catch (GuzzleException $e) {
            throw new \Exception($e->getMessage());
        }

        $statusCode = $response->getStatusCode();
        $this->checkStatusCodeIsGreen($statusCode, $request);

        $json = $response->getBody()->getContents();
        $data = json_decode($json);
        $data = $data->accountBalance;

        return $data;
    }


    /**
     * Create request for operation 'getBalance'
     *
     * @param  string $accountId
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */

    private function getBalanceRequest(string $accountId)
    {
        $resourcePath = "/{accountid}/Billing/Balance";

        $resourcePath = str_replace("{accountid}", $accountId, $resourcePath);

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('GET', $requestUrl);

        return $request;
    }

    /**
     * Increase Account balance
     *
     * @param string $accountId
     * @param array $values
     * @return float
     * @throws \Exception
     */

    public function increaseBalance(string $accountId, array $values)
    {
        $request = $this->increaseBalanceRequest($accountId);

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
     * Create request for operation 'increaseBalance'
     *
     * @param  string $accountId
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */

    private function increaseBalanceRequest(string $accountId)
    {
        $resourcePath = "/{accountid}/Billing/Balance";

        $resourcePath = str_replace("{accountid}", $accountId, $resourcePath);

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('POST', $requestUrl);

        return $request;
    }

    /**
     * Get Credit Cards
     *
     * @param string $accountId
     * @return array
     * @throws \Exception
     */

    public function getCreditCards(string $accountId)
    {
        $request = $this->getCreditCardsRequest($accountId);

        try {
            $response = $this->client->send($request, ['headers' => $this->requestHeaders]);
        } catch (GuzzleException $e) {
            throw new \Exception($e->getMessage());
        }

        $statusCode = $response->getStatusCode();
        $this->checkStatusCodeIsGreen($statusCode, $request);

        $json = $response->getBody()->getContents();
        $data = json_decode($json);
        $data = $data->creditCards;

        return $data;
    }


    /**
     * Create request for operation 'getCreditsCards'
     *
     * @param  string $accountId
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */

    private function getCreditCardsRequest(string $accountId)
    {
        $resourcePath = "/{accountid}/Billing/CreditCards";

        $resourcePath = str_replace("{accountid}", $accountId, $resourcePath);

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('GET', $requestUrl);

        return $request;
    }

    /**
     * Add Credit card
     *
     * @param string $accountId
     * @param array $values
     * @return float
     * @throws \Exception
     */

    public function addCreditCard(string $accountId, array $values)
    {
        $request = $this->addCreditCardRequest($accountId);

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
     * Create request for operation 'addCreditCard'
     *
     * @param  string $accountId
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */

    private function addCreditCardRequest(string $accountId)
    {
        $resourcePath = "/{accountid}/Billing/CreditCards";

        $resourcePath = str_replace("{accountid}", $accountId, $resourcePath);

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('POST', $requestUrl);

        return $request;
    }

    /**
     * Delete Credit card
     *
     * @param string $accountId
     * @param string $cardId
     * @return object
     * @throws \Exception
     */

    public function deleteCreditCard(string $accountId, string $cardId)
    {
        $request = $this->deleteCreditCardRequest($accountId, $cardId);

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
     * Create request for operation 'deleteCreditCard'
     *
     * @param string $accountId
     * @param string $cardId
     * @return \GuzzleHttp\Psr7\Request
     */

    private function deleteCreditCardRequest(string $accountId, string $cardId)
    {
        $resourcePath = "/{accountid}/Billing/CreditCards/{id}";

        $resourcePath = str_replace("{accountid}", $accountId, $resourcePath);
        $resourcePath = str_replace("{id}", $cardId, $resourcePath);

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('DELETE', $requestUrl);

        return $request;
    }

    /**
     * Update Credit card
     *
     * @param string $accountId
     * @param string $cardId
     * @param array $values
     * @return object
     * @throws \Exception
     */

    public function updateCreditCard(string $accountId, string $cardId, array $values)
    {
        $request = $this->updateCreditCardRequest($accountId, $cardId);

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
     * Create request for operation 'updateCreditCard'
     *
     * @param string $accountId
     * @param string $cardId
     * @return \GuzzleHttp\Psr7\Request
     */

    private function updateCreditCardRequest(string $accountId, string $cardId)
    {
        $resourcePath = "/{accountid}/Billing/CreditCards/{id}";

        $resourcePath = str_replace("{accountid}", $accountId, $resourcePath);
        $resourcePath = str_replace("{id}", $cardId, $resourcePath);

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('PUT', $requestUrl);

        return $request;
    }

    /**
     * Verify Credit card
     *
     * @param string $accountId
     * @param string $cardId
     * @return object
     * @throws \Exception
     */

    public function verifyCreditCard(string $accountId, string $cardId)
    {
        $request = $this->verifyCreditCardRequest($accountId, $cardId);

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
     * Create request for operation 'verifyCreditCard'
     *
     * @param string $accountId
     * @param string $cardId
     * @return \GuzzleHttp\Psr7\Request
     */

    private function verifyCreditCardRequest(string $accountId, string $cardId)
    {
        $resourcePath = "/{accountid}/Billing/CreditCards/{id}/verify";

        $resourcePath = str_replace("{accountid}", $accountId, $resourcePath);
        $resourcePath = str_replace("{id}", $cardId, $resourcePath);

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('PUT', $requestUrl);

        return $request;
    }

    /**
     * Get Billing Plans
     *
     * @param string $accountId
     * @return array
     * @throws \Exception
     */

    public function getBillingPlans(string $accountId)
    {
        $request = $this->getBillingPlansRequest($accountId);

        try {
            $response = $this->client->send($request, ['headers' => $this->requestHeaders]);
        } catch (GuzzleException $e) {
            throw new \Exception($e->getMessage());
        }

        $statusCode = $response->getStatusCode();
        $this->checkStatusCodeIsGreen($statusCode, $request);

        $json = $response->getBody()->getContents();
        $data = json_decode($json);
        $data = $data->plans;

        return $data;
    }


    /**
     * Create request for operation 'getBillingPlans'
     *
     * @param  string $accountId
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */

    private function getBillingPlansRequest(string $accountId)
    {
        $resourcePath = "/{accountid}/Billing/Plans";

        $resourcePath = str_replace("{accountid}", $accountId, $resourcePath);

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('GET', $requestUrl);

        return $request;
    }

    /**
     * Update Billing Plan
     *
     * @param string $accountId
     * @param string $planId
     * @return array
     * @throws \Exception
     */

    public function updateBillingPlan(string $accountId, string $planId)
    {
        $request = $this->updateBillingPlanRequest($accountId);

        try {
            $response = $this->client->send($request, [
                'headers' => $this->requestHeaders,
                'json' => [
                    'planId' => $planId
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
     * Create request for operation 'updateBillingPlan'
     *
     * @param  string $accountId
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */

    private function updateBillingPlanRequest(string $accountId)
    {
        $resourcePath = "/{accountid}/Billing/Plans";

        $resourcePath = str_replace("{accountid}", $accountId, $resourcePath);

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('PUT', $requestUrl);

        return $request;
    }

    /**
     * Get CCTransactions
     *
     * @param string $accountId
     * @param int $pastDays
     * @param int $days
     * @param int $pastMonths
     * @param int $months
     *
     * @return array
     * @throws \Exception
     */

    public function getCCTransactions(string $accountId, $pastMonths = 0, $months = 0, $pastDays = 0, $days = 0)
    {
        $request = $this->getCCTransactionsRequest($accountId);

        try {
            $response = $this->client->send($request, [
                'headers' => $this->requestHeaders,
                'query'   => [
                    "pastDays"   => ($pastDays > 0)? $pastDays : null,
                    "days"       => ($days > 0)? $days : null,
                    "pastMonths" => ($pastMonths > 0)? $pastMonths : null,
                    "months"     => ($months > 0)? $months : null,
                ]
            ]);
        } catch (GuzzleException $e) {
            throw new \Exception($e->getMessage());
        }

        $statusCode = $response->getStatusCode();
        $this->checkStatusCodeIsGreen($statusCode, $request);

        $json = $response->getBody()->getContents();
        $data = json_decode($json);
        $data = $data->ccTransactions;

        return $data;
    }


    /**
     * Create request for operation 'getCCTransactions'
     *
     * @param  string $accountId
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */

    private function getCCTransactionsRequest(string $accountId)
    {
        $resourcePath = "/{accountid}/Billing/CCTransactions";

        $resourcePath = str_replace("{accountid}", $accountId, $resourcePath);

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('GET', $requestUrl);

        return $request;
    }
}