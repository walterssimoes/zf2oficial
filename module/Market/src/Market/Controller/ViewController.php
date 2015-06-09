<?php
namespace Market\Controller;


use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ViewController extends AbstractActionController{
    public function indexAction()
    {
        $category = $this->params()->fromQuery("category");
        
        $array = ["category" => $category];
        
        return new ViewModel($array);
    }
    
    public function itemAction()
    {
        $itemId = $this->params()->fromQuery("itemId");
        
        if(empty($itemId)){
            $this->flashMessenger()->addMessage("Item not found!");
            
           return $this->redirect()->toRoute('market');
        }
        
        $array = ["itemId" => $itemId];
        
        return new ViewModel($array);
    }
}
