<?php
/**
 * Created by PhpStorm.
 * User: vsdev
 * Date: 6/15/15
 * Time: 7:22 PM
 */

namespace Application\Controller;


use Zend\Mvc\Controller\AbstractActionController;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        return $this->redirect()->toRoute('dashboard');
    }
}