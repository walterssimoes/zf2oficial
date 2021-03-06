<?php


namespace Market\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Market\Form\PostForm;


class PostFormFactory implements FactoryInterface
{
    
    public function createService(ServiceLocatorInterface $sm)
    {
        $categories      = $sm->get('categories');
        $date_expires    = $sm->get('date-expires');
        $captcha_options = $sm->get('market-captcha-options');
        $filters         = $sm->get('market-post-filter');
        
        $form = new PostForm();
        $form->setCategories($categories);
        $form->setDateExpires($date_expires);
        $form->setCaptchaOptions($captcha_options);
        $form->buildForm();
        $form->setInputFilter($filters);
        
        return $form;
        
    }
}
