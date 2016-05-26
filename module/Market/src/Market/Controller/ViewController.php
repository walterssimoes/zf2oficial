<?php
namespace Market\Controller;


use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ViewController extends AbstractActionController
{
    use listingsTableTrait;
    
    public function indexAction()
    {
        $category = $this->params()->fromRoute("category");
        
        $listings = $this->listingsTable->getListingsByCategory($category);
        
        $array = ["category" => $category, "listings" => $listings];
        
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
