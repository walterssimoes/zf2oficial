<?php
namespace Market\Controller;


use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ViewController extends AbstractActionController{
    public function indexAction(){
        $array = ["category" => "CATEGORY POSTINGS"];
        
        return new ViewModel($array);
    }
}
