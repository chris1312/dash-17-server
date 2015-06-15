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

    public function fetch()
    {
        $client = new Client(['base_uri' => $this->accessConfig['base_url']]);

        $response = $client->post('user/login', [
            'query' => [
                'login' => $this->accessConfig['login'],
                'password' => $this->accessConfig['password']
            ]
        ]);
        
        return 'some superb data!';
    }
}