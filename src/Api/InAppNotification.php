<?php
namespace Soltexmedia\Api;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Request;

class InAppNotification extends RingbaApi {

    /**
     * Get Notifications
     *
     * @param int $page
     * @param int $pageSize
     * @param $paginationKey
     * @throws \Exception
     * @return object
     */

    public function getNotifications(int $page, int $pageSize, $paginationKey = 0)
    {
        $request = $this->getNotificationsRequest();

        try {
            $response = $this->client->send($request, [
                'headers' => $this->requestHeaders,
                'query'   => [
                    "page"          => ($page > 0)? $page : null,
                    "pageSize"      => ($pageSize > 0)? $pageSize : null,
                    "paginationKey" => ($paginationKey > 0)? $paginationKey : null,
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
     * Create request for operation 'getNotifications'
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */

    private function getNotificationsRequest()
    {
        $resourcePath = "/notifications";

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('GET', $requestUrl);

        return $request;
    }

    /**
     * Delete Notification
     *
     * @param string $notificationId
     * @throws \Exception
     * @return object
     */

    public function deleteNotification(string $notificationId)
    {
        $request = $this->deleteNotificationRequest($notificationId);

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
     * Create request for operation 'deleteNotification'
     *
     * @param string $notificationId
     * @return \GuzzleHttp\Psr7\Request
     */

    private function deleteNotificationRequest(string $notificationId)
    {
        $resourcePath = "/notifications/{id}";

        if ($notificationId === null) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $notificationId when calling deleteNotification'
            );
        } else {
            $resourcePath = str_replace("{id}", $notificationId, $resourcePath);
        }

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('DELETE', $requestUrl);

        return $request;
    }

    /**
     * Get Notification
     *
     * @param string $notificationId
     * @param bool $markAsRead
     * @throws \Exception
     * @return object
     */

    public function getNotification(string $notificationId, $markAsRead = false)
    {
        $request = $this->getNotificationRequest($notificationId);

        try {
            $response = $this->client->send($request, [
                'headers' => $this->requestHeaders,
                'query' => [
                    "markAsRead" => $markAsRead
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
     * Create request for operation 'getNotification'
     *
     * @param string $notificationId
     * @return \GuzzleHttp\Psr7\Request
     */

    private function getNotificationRequest(string $notificationId)
    {
        $resourcePath = "/notifications/{id}";

        $resourcePath = str_replace("{id}", $notificationId, $resourcePath);

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('GET', $requestUrl);

        return $request;
    }

    /**
     * Mark Notification as read
     *
     * @param string $notificationId
     * @throws \Exception
     * @return object
     */

    public function markNotificationAsRead(string $notificationId)
    {
        $request = $this->markNotificationAsReadRequest($notificationId);

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
     * Create request for operation 'markNotificationAsRead'
     *
     * @param string $notificationId
     * @return \GuzzleHttp\Psr7\Request
     */

    private function markNotificationAsReadRequest(string $notificationId)
    {
        $resourcePath = "/notifications/{id}";

        $resourcePath = str_replace("{id}", $notificationId, $resourcePath);

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('PUT', $requestUrl);

        return $request;
    }

    /**
     * Get Notifications Counts
     *
     * @throws \Exception
     * @return object
     */

    public function getCounts()
    {
        $request = $this->getCountsRequest();

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
     * Create request for operation 'getCounts'
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */

    private function getCountsRequest()
    {
        $resourcePath = "/notifications/counts";

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('GET', $requestUrl);

        return $request;
    }

    /**
     * Get Toasts
     *
     * @throws \Exception
     * @return object
     */

    public function getToasts()
    {
        $request = $this->getToastsRequest();

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
     * Create request for operation 'getToasts'
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */

    private function getToastsRequest()
    {
        $resourcePath = "/notifications/toasts";

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('GET', $requestUrl);

        return $request;
    }

    /**
     * Get All Counts and Toasts
     *
     * @throws \Exception
     * @return object
     */

    public function getAll()
    {
        $request = $this->getAllRequest();

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
     * Create request for operation 'getAll'
     *
     * @throws \InvalidArgumentException
     * @return \GuzzleHttp\Psr7\Request
     */

    private function getAllRequest()
    {
        $resourcePath = "/notifications/all";

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('GET', $requestUrl);

        return $request;
    }


}