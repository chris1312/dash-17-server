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
            if (!empty($teamId) && $teamId != $dataSet['team']) {
                continue;
            }

            $counter = $this->getTeamFailedBuilds($dataSet);

            $list[] = [
                'title' => $dataSet['title'],
                'team' => $dataSet['team'],
                'value' => $counter,
                'type' => 'count',
            ];
        }

        return $list;
    }


    private function getTeamFailedBuilds(array $dataSet)
    {
        $counter = 0;

        foreach($dataSet['queries'] as $query) {
            $response = $this->getPreparedClient()->get($query, [
                'auth' => [
                    $this->accessConfig['login'], $this->accessConfig['password'],
                ]
            ]);
            $data = Json::decode($response->getBody()->getContents(), Json::TYPE_ARRAY);

            if ($data['count'] == 0) {
                continue;
            }

            if ($data['build'][0]['status'] !== 'SUCCESS') {
                $counter++;
            }
        }

        return $counter;
    }
}