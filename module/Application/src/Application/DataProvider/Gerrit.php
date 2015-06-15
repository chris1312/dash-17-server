<?php
/**
 * Created by PhpStorm.
 * User: vsdev
 * Date: 6/15/15
 * Time: 5:54 PM
 */

namespace Application\DataProvider;


use GuzzleHttp\Client;

class Gerrit implements DataProviderInterface
{
    /** @var array */
    private $dataSets;

    /** @var Client */
    private $client;

    /** @var array */
    private $accessConfig;

    /**
     * @param Client $client
     * @param array $accessConfig
     * @param array $dataSets
     */
    public function __construct($accessConfig, $dataSets)
    {
        $this->accessConfig = $accessConfig;
        $this->dataSets = $dataSets;
    }

    private function getClient()
    {
        if (!$this->client) {
            $this->client = new Client([
                'base_uri' => $this->accessConfig['base_url'],
                'cookies' => true,
                'headers' => ['Accept' => 'application/json']
            ]);
        }

        return $this->client;
    }

    public function fetch()
    {


//        $response = $this->getClient()->get('projects', [
//            'auth' => [
//                $this->accessConfig['login'], $this->accessConfig['password'], 'digest',
//            ]
//        ]);
//
//        $contents = $response->getBody()->getContents();
//
//        die(var_export($contents));
    }
}