<?php
namespace Market\Controller;


use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ViewController extends AbstractActionController{
    use ListingsTableTrait;
    
    public function indexAction()
    {
        $category = $this->params()->fromRoute("category");
        
        $array = ["category" => $category];
        
        return new ViewModel($array);
    }
    
    public function itemAction()
    {
        $itemId = $this->params()->fromRoute("itemId");
        
        if(empty($itemId)){
            $this->flashMessenger()->addMessage("Item not found!");
            
           return $this->redirect()->toRoute('market');
        }
        
        $array = ["itemId" => $itemId];
        
        return new ViewModel($array);
    }
}
