<?php

namespace Application\Controller\Rest;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;

class DashboardController extends AbstractRestfulController
{
    public function getList()
    {
        /** @var \Application\Service\DataManager $service */
        $service = $this->getServiceLocator()->get('Application\Service\DataManager');

        return new JsonModel($service->getData());
    }
}
