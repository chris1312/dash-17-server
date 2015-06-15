<?php
namespace Application\DataProvider;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

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

    private function getPreparedClient(){
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

    public function fetch()
    {
        $client = $this->getPreparedClient();
        $returned = [];

        foreach($this->dataSets as $ds) {
            $query = [
                'filter' => $ds['query'],
            ];
            if($ds['type'] == 'count'){
                $query['with'] = 'id';
            }
            $response = $client->get('issue', ['query' => $query]);
            $decodedResponse = json_decode($response->getBody(), true);
            $iterationValue = [
                'title' => $ds['title'],
                'type' => $ds['type'],
            ];
            if($ds['type'] == 'count'){
                $iterationValue['value'] = count($decodedResponse['issue']);
            }
            $returned[] = $iterationValue;
        }

        return $returned;
    }
}