<?php
namespace WAQI\Entity;
use GuzzleHttp\Client;

abstract class WaqiAPIEntity 
{
    protected $apiKey;
    protected $queryParams = [];
    private $client;
    protected $baseUrl = "https://api.waqi.info/";

    /**
     * Get the base URL of the API entity
     * @return string base URL of the API entity
     */
    abstract protected function url();

    public function __construct($apiKey) 
    {
        $this->apiKey = $apiKey;
        $this->client = new Client();
    }

    private function buildQueryParams() 
    {
        if (empty($this->queryParams)) {
            return '';
        }
        return '&' . http_build_query($this->queryParams);
    }

    /**
     * Fetches responses for this API entity from the guardian API endpoint
     * @param bool $asArray Specifies if response should be returned as a PHP object or an associative array
     * @return object|array
     */
    final public function fetch(bool $asArray = false) 
    {
        $url = $this->url();
        $url .= '?token=' . $this->apiKey;
        $url .= $this->buildQueryParams();
        $response = $this->makeApiCall($url);
        return json_decode($response, $asArray);
    }

    private function makeApiCall(string $url): string
    {
        $headers = [
            "Accept" => "application/json"
        ];
        $response = $this->client->request('GET', $url, [
            'headers' => $headers
        ]);

        return $response->getBody()->getContents();
    }
}