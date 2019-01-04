<?php

namespace App\Services;

use GuzzleHttp\Client;
use UnexpectedValueException;

abstract class ApiRequest
{

    const FETCH_OBJ = 1;
    const FETCH_ARRAY = 2;

    /**
     * The HTTP client associated to class.
     *
     * @var Client
     */
    private $client;
    
    /**
     * The URL of the API.
     *
     * @var string
     */
    private $apiUrl;
    
    /**
     * Set the client property.
     * 
     * @param Client $client
     * 
     * @return $this
     */
    public function setClient(Client $client)
    {
        $this->client = $client;
        return $this;
    }
    
    /**
     * Set the API URL property.
     * 
     * @param string $apiUrl
     * 
     * @return $this
     */
    public function setApiUrl(string $apiUrl)
    {
        $this->apiUrl = $apiUrl;
        return $this;
    }
    
    /**
     * Create a new class instance.
     * 
     * @return void
     */
    public function __construct()
    {
        $this->setClient(new Client());
        throw_unless($this->apiUrl, new UnexpectedValueException('Property $apiUrl is not set.'));
    }
    
    /**
     * Return API response.
     * 
     * @param string $endpoint
     * @param int $type
     * 
     * @return array|\stdClass
     */
    public function getResponse(string $endpoint = '', int $type = self::FETCH_OBJ)
    {
        $methodName = 'transformResponse';
        $response = json_decode($this->makeRequest($endpoint), $type === self::FETCH_ARRAY);
        return method_exists($this, $methodName) ? $this->{$methodName}($response) : $response;
    }
    
    /**
     * Make an API request.
     * 
     * @param string $endpoint
     * 
     * @return string
     */
    private function makeRequest(string $endpoint): string
    {
        return $this->client->get($this->apiUrl . $endpoint)
                ->getBody()
                ->getContents();
    }
}
