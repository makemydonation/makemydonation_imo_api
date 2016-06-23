<?php
namespace MakemydonationImo;

abstract class MakemydonationImoApi
{
    // Make My Donation API live base url.
    private $base_url_live = 'https://api.makemydonation.org/v1';

    // Make My Donation API sandbox base url.
    private $base_url_sandbox = 'http://api.sandbox.makemydonation.org/v1';

    // Make My Donation API current base url.
    private $base_url;

    // Make My Donation account username.
    private $auth_username;

    // Make My Donation account API Key.
    private $auth_api_key;

    // API Request response body.
    private $responseBody;

    // API Request response code.
    private $responseCode;

    public function __construct()
    {
        $this->base_url = $this->base_url_live;
    }

    /**
     * Set authentication details.
     *
     * @param string username
     * @param string api_key
     */
    public function setAuth($username, $api_key)
    {
        $this->auth_username = $username;
        $this->auth_api_key = $api_key;
    }

    /**
     * Set environment to sandbox.
     */
    public function useSandbox()
    {
        $this->base_url = $this->base_url_sandbox;
    }

    /**
     * Set environment to live.
     */
    public function useLive()
    {
        $this->base_url = $this->base_url_live;
    }

    /**
     * Wrapper to do the request.
     */
    protected function request($method, $path, $data = NULL)
    {
        $url = $this->base_url;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "$url/$path");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_VERBOSE, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, TRUE);
        curl_setopt($ch, CURLOPT_USERPWD, "{$this->auth_username}:{$this->auth_api_key}");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);

        switch (strtolower($method)) {
            case 'post':
                curl_setopt($ch, CURLOPT_POST, TRUE);
                break;
            case 'put':
                curl_setopt($ch, CURLOPT_PUT, TRUE);
                break;
            case 'get':
            default:
                curl_setopt($ch, CURLOPT_HTTPGET, TRUE);
                break;
        }

        if ($data) {
            $json = json_encode($data);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        }
        $response = curl_exec($ch);

        $info = curl_getinfo($ch);
        $this->responseCode = $info['http_code'];
        $header_size = $info['header_size'];
        $this->responseBody = substr($response, $header_size);
        curl_close($ch);
    }

    /**
     * Get the response HTTP code.
     */
    public function responseCode()
    {
        return $this->responseCode;
    }

    /**
     * Get the response body.
     */
    public function responseBody()
    {
        return $this->responseBody;
    }

    /**
     * Get the parsed response code.
     */
    public function response()
    {
        $body = $this->responseBody();

        $response = json_decode($body);

        return $response;
    }
}