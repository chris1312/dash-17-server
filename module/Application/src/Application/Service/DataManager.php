<?php
namespace Application\Service;

use Application\DataProvider\DataProviderInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class DataManager
{
    /** @var ServiceLocatorInterface */
    private $serviceLocator;

    /**
     * @param ServiceLocatorInterface $serviceLocator
     */
    public function __construct(ServiceLocatorInterface $serviceLocator)
    {
        $this->serviceLocator = $serviceLocator;
    }

    public function getData(string $teamId)
    {
        $config = $this->serviceLocator->get('config');

        $result = [];
        foreach ($config['providers'] as $provider => $data) {

            $serviceName = sprintf('Application\DataProvider\%s', $provider);

            /** @var DataProviderInterface $service */
            $instance = $this->serviceLocator->get($serviceName);
            $result[$provider] = $instance->fetch($teamId);
        }

        return $result;
    }
}