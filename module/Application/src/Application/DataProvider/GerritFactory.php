<?php
namespace Application\DataProvider;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class GerritFactory implements FactoryInterface
{
    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return Gerrit
     */
    public function createService(ServiceLocatorInterface $serviceLocator) : Gerrit
    {
        $config = $serviceLocator->get('config');

        return new Gerrit($config['provider_access']['gerrit'], $config['providers']['gerrit']);
    }
}
