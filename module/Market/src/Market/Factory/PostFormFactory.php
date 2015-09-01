<?php


namespace Market\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Market\Form\PostForm;


class PostFormFactory implements FactoryInterface
{
    
    public function createService(ServiceLocatorInterface $controllerManager)
    {
        $services = $controllerManager->getServiceLocator();
        $sm = $services->get('ServiceManager');
        $categories = $sm->get('categories');
        
        $form = new PostForm();
        $form->setCategories($categories);
        $form->buildForm();
        
        return $form;
    }
}
