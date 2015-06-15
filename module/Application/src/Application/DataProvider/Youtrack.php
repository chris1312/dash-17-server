<?php
namespace Application\DataProvider;

use GuzzleHttp\Client;

class Youtrack implements DataProviderInterface
{
    /** @var Client */
    private $client;

    /** @var array */
    private $config;

    public function __construct(Client $client, $config)
    {
        $this->client = $client;
        $this->config = $config;
    }

    public function fetch()
    {
        return 'some superb data!';
    }
}