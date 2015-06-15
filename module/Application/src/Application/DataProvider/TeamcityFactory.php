<?php
namespace Application\DataProvider;


use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class TeamcityFactory implements FactoryInterface
{

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        /** @var array $config */
        $config = $serviceLocator->get('config');

        return new Teamcity($config['provider_access']['teamcity'], $config['providers']['teamcity']);
    }
}