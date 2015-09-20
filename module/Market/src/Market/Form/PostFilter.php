<?php
namespace Market\Form;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Input;
use Search\Filter\Float;
use Zend\Validator\Regex;
/**
 * Description of PostFormFilter
 *
 * @author walter
 */
class PostFilter extends InputFilter {
    //put your code here
    private $categories;
    
    
    public function setCategories($categories)
    {
        $this->categories = $categories;
    }
    
    public function buildFilter(){
        $category = new Input("category");
        $category->getFilterChain()
                 ->attachByName("Stringtrim")
                 ->attachByName("StripTags")
                 ->attachByName("StringToLower");
        
        $category->getValidatorChain()
                 ->attachByName("InArray", array('haystack' => $this->categories));
        
        //===
        
        $title = new Input('title');
        $title->getFilterChain()
              ->attachByName('StringTrim')
              ->attachByName('StripTags');
        
        $titleRegex = new Regex(array("pattern" => "/^[a-zA-Z0-9 ]*$/"));
        $titleRegex->setMessage("Title should only contain letter, numbers or white spaces");
        
        $title->getValidatorChain()
              ->attach($titleRegex)
                ->attachByName("StringLength", array('min'=> 1, 'max'=>128)); 
        
        //===
        
        $priceMin = new Input('priceMin');
        $priceMin->setAllowEmpty(TRUE);
        $priceFilter = new Float();
        $priceMin->getFilterChain()
                         ->attach($priceFilter);

        $priceMax = new Input('priceMax');
        $priceMax->setAllowEmpty(TRUE);
        $priceFilter = new Float();
        $priceMax->getFilterChain()
                         ->attach($priceFilter);

        $expires = new Input('date_expires');
        $expires->setAllowEmpty(TRUE);
        $expires->getFilterChain()
                    ->attachByName('StripTags')
                        ->attachByName('StringTrim');

        $city = new Input('city_code');
        $city->setAllowEmpty(TRUE);
        $city->getFilterChain()
                 ->attachByName('StripTags')
                 ->attachByName('StringTrim');

        $country = new Input('country');
        $country->setAllowEmpty(TRUE);
        $country->getFilterChain()
                        ->attachByName('StringToUpper')
                        ->attachByName('StripTags')
                        ->attachByName('StringTrim');

        $name = new Input('contact_name');
        $name->setAllowEmpty(TRUE);
        $name->getFilterChain()
                  ->attachByName('StripTags')
                  ->attachByName('StringTrim');

        $phone = new Input('contact_phone');
        $phone->setAllowEmpty(TRUE);
        $phone->getFilterChain()
                  ->attachByName('StripTags')
                  ->attachByName('StringTrim');

        $email = new Input('contact_email');
        $email->setAllowEmpty(TRUE);
        $email->getFilterChain()
                  ->attachByName('StripTags')
                  ->attachByName('StringTrim');

        $description = new Input('description');
        $description->setAllowEmpty(TRUE);
        $description->getFilterChain()
                            ->attachByName('StripTags')
                            ->attachByName('StringTrim');

        $this->add($category)
             ->add($title)
             ->add($priceMin)
             ->add($priceMax)
             ->add($expires)
             ->add($city)
             ->add($country)
             ->add($name)
             ->add($phone)
             ->add($email)
             ->add($description);
        
        $this->add($category)
             ->add($title);
    }
}
