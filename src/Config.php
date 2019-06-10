<?php
namespace Soltexmedia;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;

class Config {
    protected $host = 'https://api.ringba.com/v2';

    protected $user;
    protected $password;
    protected $access_token;

    public function __construct($user, $password)
    {
        $this->user         = $user;
        $this->password     = $password;
        $this->access_token = $this->checkToken();
    }

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->access_token;
    }

    /**
     * @return string
     */
    private function checkToken()
    {
        $token = Cache::get($this->user . "_token");

        if(!$token) {
            $token = $this->setToken();
        }

        return $token;
    }

    /**
     * Request new token and save it in Cache
     *
     * @return string
     */
    private function setToken()
    {
        $data    = $this->requestNewToken();
        $token   = $data->access_token;
        $seconds = $data->expires_in;

        Cache::put($this->user . "_token", $token, $seconds);

        return $token;
    }

    /**
     * @return object
     */
    private function requestNewToken()
    {
        $resourcePath = "/token";
        $client = new Client();

        try {
            $response = $client->request('POST', $this->host . $resourcePath, [
                'Content-Type' => 'application/x-www-form-urlencoded',
                'Charset' => 'UTF-8',
                'form_params' => [
                    'username'=>$this->user,
                    'password' => $this->password,
                    'grant_type' => 'password',
                ],
            ]);
        } catch(\GuzzleHttp\Exception\GuzzleException $e) {
            echo $e->getMessage();
        }

        $json = $response->getBody()->getContents();
        $data = json_decode($json);

        return $data;
    }


    /**
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getToken11()
    {
        $resourcePath = "/token";
        $client = new Client();

        $response = $client->request('POST', $this->host . $resourcePath, [
            'Content-Type' => 'application/x-www-form-urlencoded',
            'Charset' => 'UTF-8',
            'form_params' => [
                'username'=>$this->user,
                'password' => $this->password,
                'grant_type' => 'password',
            ],

        ]);

        $json = $response->getBody()->getContents();
        $data = json_decode($json);
        dd($data);
        $token = $data->access_token;

        return $token;
    }

    public function getHost()
    {
        return $this->host;
    }
}