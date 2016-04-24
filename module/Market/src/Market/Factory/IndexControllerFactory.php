<?php


namespace Market\Factory;

use \Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class IndexControllerFactory implements FactoryInterface{
    
    public function createService(ServiceLocatorInterface $controllerManager) {
        $services = $controllerManager->getServiceLocator();
        $sm = $services->get('ServiceManager');
        
        $indexController = new \Market\Controller\IndexController();

        $indexController->setListingsTable($sm->get('listings-table'));
        
        
        return $indexController;
    }
}
