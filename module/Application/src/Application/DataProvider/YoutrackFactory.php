<?php
/**
 * Created by PhpStorm.
 * User: vsdev
 * Date: 6/15/15
 * Time: 2:30 PM
 */

namespace Application\DataProvider;


use GuzzleHttp\Client;
use Zend\ServiceManager\{FactoryInterface, ServiceLocatorInterface};

class YoutrackFactory implements FactoryInterface
{

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('config');

        return new Youtrack(new Client(), $config['provider_access']['youtrack'], $config['providers']['youtrack']);
    }
}