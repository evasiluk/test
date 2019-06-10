<?php
namespace Soltexmedia\Api;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Request;

class RingbaAccount extends RingbaApi {

    /**
     * Get Accounts
     *
     * @return object
     * @throws \Exception
     */

    public function getAccounts()
    {
        $request = $this->getAccountsRequest();

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
     * Create request for operation 'getAccounts'
     *
     * @return \GuzzleHttp\Psr7\Request
     */

    private function getAccountsRequest()
    {
        $resourcePath = "/RingbaAccounts";

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('GET', $requestUrl);

        return $request;
    }

    /**
     * Get Account
     *
     * @param $accountId
     * @return object
     * @throws \Exception
     */

    public function getAccount($accountId)
    {
        $request = $this->getAccountRequest($accountId);

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
     * Create request for operation 'getAccount'
     *
     * @param $accountId
     * @return \GuzzleHttp\Psr7\Request
     */

    private function getAccountRequest($accountId)
    {
        $resourcePath = "/RingbaAccounts/{accountId}";

        $resourcePath = str_replace("{accountId}", $accountId, $resourcePath);

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('GET', $requestUrl);

        return $request;
    }

    /**
     * Update Account
     *
     * @param $accountId
     * @param $values
     * @return object
     * @throws \Exception
     */

    public function updateAccount($accountId, array $values)
    {
        $request = $this->updateAccountRequest($accountId);

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
     * Create request for operation 'updateAccount'
     *
     * @param $accountId
     * @return \GuzzleHttp\Psr7\Request
     */

    private function updateAccountRequest($accountId)
    {
        $resourcePath = "/RingbaAccounts/{accountId}";

        $resourcePath = str_replace("{accountId}", $accountId, $resourcePath);

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('PATCH', $requestUrl);

        return $request;
    }

    /**
     * Get Account Users
     *
     * @param $accountId
     * @param bool $includeAllRoles.
     *
     * @return object
     * @throws \Exception
     */

    public function getUsers($accountId, $includeAllRoles = false)
    {
        $request = $this->getUsersRequest($accountId);

        try {
            $response = $this->client->send($request, [
                'headers' => $this->requestHeaders,
                'query'    => [
                    'includeAllRoles' => $includeAllRoles
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
     * Create request for operation 'getUsers'
     *
     * @param $accountId
     * @return \GuzzleHttp\Psr7\Request
     */

    private function getUsersRequest($accountId)
    {
        $resourcePath = "/{accountId}/users";

        $resourcePath = str_replace("{accountId}", $accountId, $resourcePath);

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('GET', $requestUrl);

        return $request;
    }

    /**
     * Add User
     *
     * @param $accountId
     * @param $values
     * @return object
     * @throws \Exception
     */

    public function addUser($accountId, array $values)
    {
        $request = $this->addUserRequest($accountId);

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
     * Create request for operation 'addUser'
     *
     * @param $accountId
     * @return \GuzzleHttp\Psr7\Request
     */

    private function addUserRequest($accountId)
    {
        $resourcePath = "/{accountId}/users";

        $resourcePath = str_replace("{accountId}", $accountId, $resourcePath);

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('PUT', $requestUrl);

        return $request;
    }

    /**
     * Get Account Users 2
     *
     * @param $accountId
     * @param bool $includeAllRoles.
     *
     * @return object
     * @throws \Exception
     */

    public function getUsers_($accountId, $includeAllRoles = false)
    {
        $request = $this->getUsersRequest_($accountId);

        try {
            $response = $this->client->send($request, [
                'headers' => $this->requestHeaders,
                'query'    => [
                    'includeAllRoles' => $includeAllRoles
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
     * Create request for operation 'getUsers_'
     *
     * @param $accountId
     * @return \GuzzleHttp\Psr7\Request
     */

    private function getUsersRequest_($accountId)
    {
        $resourcePath = "/RingbaAccounts/{accountId}/users";

        $resourcePath = str_replace("{accountId}", $accountId, $resourcePath);

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('GET', $requestUrl);

        return $request;
    }

    /**
     * Add User 2
     *
     * @param $accountId
     * @param $values
     * @return object
     * @throws \Exception
     */

    public function addUser_($accountId, array $values)
    {
        $request = $this->addUserRequest_($accountId);

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
     * Create request for operation 'addUser_'
     *
     * @param $accountId
     * @return \GuzzleHttp\Psr7\Request
     */

    private function addUserRequest_($accountId)
    {
        $resourcePath = "/RingbaAccounts/{accountId}/users";

        $resourcePath = str_replace("{accountId}", $accountId, $resourcePath);

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('PUT', $requestUrl);

        return $request;
    }

    /**
     * Delete User
     *
     * @param $accountId
     * @param $userId
     * @param bool $notify
     * @return object
     * @throws \Exception
     */

    public function deleteUser($accountId, $userId, $notify = false)
    {
        $request = $this->deleteUserRequest($accountId, $userId);

        try {
            $response = $this->client->send($request, [
                'headers' => $this->requestHeaders,
                'query'    => [
                    'notify' => $notify
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
     * Create request for operation 'deleteUser'
     *
     * @param $accountId
     * @param $userId
     * @return \GuzzleHttp\Psr7\Request
     */

    private function deleteUserRequest($accountId, $userId)
    {
        $resourcePath = "/{accountId}/users/{userId}";

        $resourcePath = str_replace("{accountId}", $accountId, $resourcePath);
        $resourcePath = str_replace("{userId}", $userId, $resourcePath);

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('DELETE', $requestUrl);

        return $request;
    }

    /**
     * Delete User 2
     *
     * @param $accountId
     * @param $userId
     * @param bool $notify
     * @return object
     * @throws \Exception
     */

    public function deleteUser_($accountId, $userId, $notify = false)
    {
        $request = $this->deleteUserRequest_($accountId, $userId);

        try {
            $response = $this->client->send($request, [
                'headers' => $this->requestHeaders,
                'query'    => [
                    'notify' => $notify
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
     * Create request for operation 'deleteUser_'
     *
     * @param $accountId
     * @param $userId
     * @return \GuzzleHttp\Psr7\Request
     */

    private function deleteUserRequest_($accountId, $userId)
    {
        $resourcePath = "/RingbaAccounts/{accountId}/users/{userId}";

        $resourcePath = str_replace("{accountId}", $accountId, $resourcePath);
        $resourcePath = str_replace("{userId}", $userId, $resourcePath);

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('DELETE', $requestUrl);

        return $request;
    }
}