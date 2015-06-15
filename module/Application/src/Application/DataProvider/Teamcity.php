<?php
/**
 * Created by PhpStorm.
 * User: vsdev
 * Date: 6/15/15
 * Time: 6:57 PM
 */

namespace Application\DataProvider;


use GuzzleHttp\Client;
use Zend\Json\Json;

class Teamcity implements DataProviderInterface
{
    /** @var array */
    private $accessConfig;

    /** @var array */
    private $dataSets;

    /** @var Client */
    private $client;

    /**
     * @param array $accessConfig
     * @param array $dataSets
     */
    public function __construct(array $accessConfig, array $dataSets)
    {

        $this->accessConfig = $accessConfig;
        $this->dataSets = $dataSets;
    }

    private function getPreparedClient() : Client
    {
        if (!$this->client) {
            $this->client = new Client([
                'base_uri' => $this->accessConfig['base_url'],
                'cookies' => true,
                'headers' => ['Accept' => 'application/json'],
            ]);
        }

        return $this->client;
    }


    public function fetch(string $teamId)
    {
        $list = [];

        foreach ($this->dataSets as $dataSet) {
            $response = $this->getPreparedClient()->get($dataSet['query'], [
                'auth' => [
                    $this->accessConfig['login'], $this->accessConfig['password'],
                ]
            ]);

            $data = Json::decode($response->getBody()->getContents(), Json::TYPE_ARRAY);

            $list[] = [
                'title' => $dataSet['title'],
                'count' => $data['count'],
                'type' => 'count',
            ];
        }

        return $list;
    }
}