<?php


namespace Market\Factory;

use \Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ViewControllerFactory implements FactoryInterface{
    
    public function createService(ServiceLocatorInterface $controllerManager) {
        $services = $controllerManager->getServiceLocator();
        $sm = $services->get('ServiceManager');
                
        $viewController = new \Market\Controller\ViewController();

        $viewController->setListingsTable($sm->get('listings-table'));
        
        
        return $viewController;
    }
}
