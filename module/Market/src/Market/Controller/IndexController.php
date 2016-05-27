<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/Market for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Market\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    use ListingsTableTrait;
    
    public function indexAction()
    {
        $messages = NULL;
        if($this->flashMessenger()->hasMessages()){
            $messages = $this->flashMessenger()->getMessages();
        }
        
        $itemRecent = $this->listingsTable->getLatestListing();
            
        return new ViewModel(array("messages" => $messages, "item" => $itemRecent));
    }

    public function fooAction()
    {
        // This shows the :controller and :action parameters in default route
        // are working when you browse to /module-specific-root/skeleton/foo
        return array();
    }
}
