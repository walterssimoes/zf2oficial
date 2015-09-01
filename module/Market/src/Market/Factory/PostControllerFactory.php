<?php


namespace Market\Factory;

use \Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class PostControllerFactory implements FactoryInterface{
    
    public function createService(ServiceLocatorInterface $controllerManager) {
        $services = $controllerManager->getServiceLocator();
        $sm = $services->get('ServiceManager');
        
        $categories = $sm->get("categories");
        
        $postController = new \Market\Controller\PostController();
        $postController->setCategories($categories);
        $postController->setPostForm($sm->get('market-post-form'));
        
        
        return $postController;
    }
}
