<?php
namespace Market\Form;

use Zend\InputFilter\InputFilter;
/**
 * Description of PostFormFilter
 *
 * @author walter
 */
class PostFormFilter extends InputFilter {
    //put your code here
    private $categories;
    
    
    public function setCategories($categories)
    {
        $this->categories = $categories;
    }
    
    public function buildFilter(){
        
    }
}
