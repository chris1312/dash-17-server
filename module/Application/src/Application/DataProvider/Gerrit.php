<?php
namespace Application\DataProvider;

use GuzzleHttp\Client;
use Zend\Json\Json;

class Gerrit implements DataProviderInterface
{
    /** @var array */
    private $dataSets;

    /** @var Client */
    private $client;

    /** @var array */
    private $accessConfig;

    /**
     * @param array $accessConfig
     * @param array $dataSets
     */
    public function __construct($accessConfig, $dataSets)
    {
        $this->accessConfig = $accessConfig;
        $this->dataSets = $dataSets;
    }

    /**
     * @return Client
     */
    private function getClient() : Client
    {
        if (!$this->client) {
            $this->client = new Client([
                'base_uri' => $this->accessConfig['base_url'],
                'cookies' => true,
                'headers' => [
                    'Accept' => 'application/json',
                    'Content-type' => 'application/json'
                ],
                'auth' => [
                    $this->accessConfig['login'], $this->accessConfig['password'], 'digest'
                ]
            ]);
        }

        return $this->client;
    }

    private function getRequest(string $url) : array
    {
        $response = $this->getClient()->get($url);
        $contents = $response->getBody()->getContents();
        $contents = substr($contents, strpos($contents, "\n") + 1);

        return Json::decode($contents, Json::TYPE_ARRAY);
    }

    public function fetch(string $teamId)
    {
        $list = [];

        foreach($this->dataSets as $dataSet) {
            if (!empty($teamId) && $teamId != $dataSet['team']) {
                continue;
            }

            $projectsData = $this->getRequest('projects/?d');
            $searchText = $dataSet['project_description_filter'];

            $projects = array_keys(array_filter($projectsData, function (array $project) use ($searchText) {
                $haystack = isset($project['description']) ? $project['description'] : '';

                return stristr($haystack, $searchText) !== false;
            }));

            $url = sprintf($dataSet['query'], implode('|', $projects));
            $unreviewedChanges = $this->getRequest($url);

            $list[] = [
                'team' => $dataSet['team'],
                'title' => $dataSet['title'],
                'value' => count($unreviewedChanges),
                'type' => 'count',
            ];
        }

        return $list;
    }
}
