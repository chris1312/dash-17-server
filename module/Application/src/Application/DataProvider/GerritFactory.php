<?php
/**
 * Created by PhpStorm.
 * User: vsdev
 * Date: 6/15/15
 * Time: 5:54 PM
 */

namespace Application\DataProvider;


use GuzzleHttp\Client;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class GerritFactory implements FactoryInterface
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

        return new Gerrit($config['provider_access']['gerrit'], $config['providers']['gerrit']);
    }
}