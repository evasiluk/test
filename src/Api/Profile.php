<?php
namespace Soltexmedia\Api;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Request;

class Profile extends RingbaApi {

    /**
     * Get Profile
     *
     * @return array
     * @throws \Exception
     */

    public function getProfile()
    {
        $request = $this->getProfileRequest();

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
     * Create request for operation 'getProfile'
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Psr7\Request
     */

    private function getProfileRequest()
    {
        $resourcePath = "/Profile";

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('GET', $requestUrl);

        return $request;
    }

    /**
     * Update Profile
     *
     * @param $values
     * @return array
     * @throws \Exception
     */

    public function updateProfile(array $values)
    {
        $request = $this->updateProfileRequest();

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
     * Create request for operation 'updateProfile'
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Psr7\Request
     */

    private function updateProfileRequest()
    {
        $resourcePath = "/Profile";

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('PATCH', $requestUrl);

        return $request;
    }

    /**
     * Change Password
     *
     * @param $values
     * @return array
     * @throws \Exception
     */

    public function changePassword(array $values)
    {
        $request = $this->changePasswordRequest();

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
     * Create request for operation 'changePassword'
     *
     * @throws \InvalidArgumentException
     *
     * @return \GuzzleHttp\Psr7\Request
     */

    private function changePasswordRequest()
    {
        $resourcePath = "/Profile/ChangePassword";

        $requestUrl = $this->config->getHost() . $resourcePath;
        $request = new Request('POST', $requestUrl);

        return $request;
    }
}