<?php
namespace Application\DataProvider;

use GuzzleHttp\Client;

class Youtrack implements DataProviderInterface
{
    /** @var Client */
    private $client;

    /** @var array */
    private $accessConfig;

    /** @var array */
    private $dataSets;

    public function __construct(Client $client, $accessConfig, $dataSets)
    {
        $this->client = $client;
        $this->accessConfig = $accessConfig;
        $this->dataSets = $dataSets;
    }

    private function getPreparedClient() : Client
    {
        $client = new Client([
            'base_uri' => $this->accessConfig['base_url'],
            'cookies' => true,
            'headers' => ['Accept' => 'application/json'],
        ]);

        $client->post('user/login', [
            'query' => [
                'login' => $this->accessConfig['login'],
                'password' => $this->accessConfig['password']
            ]
        ]);
        return $client;
    }

    public function fetch(string $teamId)
    {
        $client = $this->getPreparedClient();
        $returned = [];

        foreach($this->dataSets as $ds) {
            if($teamId != $ds['team']){
                continue;
            }
            $query = [
                'filter' => $ds['query'],
            ];
            if($ds['type'] == 'count'){
                $response = $client->get('issue/count', ['query' => $query]);
            }

            $decodedResponse = json_decode($response->getBody(), true);

            $returned[] = [
                'title' => $ds['title'],
                'type' => $ds['type'],
                'team' => $ds['team'],
            ] + $decodedResponse;
        }

        return $returned;
    }
}