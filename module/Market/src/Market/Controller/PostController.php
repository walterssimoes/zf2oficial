<?php

namespace Market\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;


class PostController extends AbstractActionController {
    
    use ListingsTableTrait;
    
    public $categories;
    private $postForm;

    public function setCategories($categories){
        $this->categories = $categories;
    }
    
    public function setPostForm($postForm){
        $this->postForm = $postForm;
        
    }
    
    public function indexAction() {
        $data = $this->params()->fromPost();
       
        $vm =  new ViewModel(array("postForm" =>  $this->postForm, 'data' => $data));
        $vm->setTemplate('market/post/index.phtml');
        
        if($this->getRequest()->isPost()){
            $this->postForm->setData($data);
            if($this->postForm->isValid()){
                
                $this->listingsTable->addPosting($this->postForm->getData());
                
                $this->flashMessenger()->addMessage("Thanks for posting!");
                $this->redirect()->toRoute('home');
            }
            else{
                $invalidView = new ViewModel();
                $invalidView->setTemplate("market/post/invalid.phtml");
                $invalidView->addChild($vm, 'main');
                
                return $invalidView;
            }
        }
        
        
        
        
            
//        $vm->setTemplate("market/post/invalid.phtml");
       
        return $vm;
    }
}
