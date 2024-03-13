<?php

namespace App\Services;

use GuzzleHttp\Client;

class ApiService
{
    protected $baseUrl;

     public function __construct()
     {
         $this->baseUrl = env('PUBLIC_API_URL');
     }
    public function fetchEntities()
    {
        $client = new Client();

        $response = $client->request('GET', $this->baseUrl.'/entries');
        $data = json_decode($response->getBody()->getContents(), true);

        return $data['entries'];
    }
}
