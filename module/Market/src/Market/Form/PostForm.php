<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Market\Form;

use Zend\Form\Element\Select;
use Zend\Form\Element\Text;
use Zend\Form\Element\Submit;
use Zend\Form\Form;
/**
 * Description of PostForm
 *
 * @author walter
 */
class PostForm extends Form 
{
    private $categories;
    
    public function setCategories($categories)
    {
        $this->categories = $categories;
    }
    
    public function buildForm()
    {
        $this->setAttribute("method", "POST");
        
        $category = new Select("category");
        $category->setLabel("Category")
                 ->setValueOptions(
                         array_combine($this->categories, $this->categories)     
                    );
        
        $title = new Text("title");
        $title->setLabel("Title")
              ->setAttributes(
                    ['size'=>50, 'maxlenght' => 128, 'placeholder' => 'digite o título']      
                );
        
        $submit = new Submit("submit");
        $submit->setAttribute('value', 'Send');
        
        $this->add($category)
             ->add($title)
             ->add($submit);
    }
}
