<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Market\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Market\Form\PostFilter;

/**
 * Description of PostFilterfactory
 *
 * @author walter
 */
class PostFilterFactory implements FactoryInterface 
{
    //put your code here
    public function createService(ServiceLocatorInterface $sm) {
        $filter = new PostFilter();
        
        $categories = $sm->get("categories");
        
        $filter->setCategories($categories);
        $filter->buildFilter();
        
        return $filter;
    }
}
