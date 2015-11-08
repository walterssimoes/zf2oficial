<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Market\Form;

use Zend\Form\Form;
use Zend\Form\Element\Select;
use Zend\Form\Element\Text;
use Zend\Form\Element\Number;
use Zend\Form\Element\Radio;
use Zend\Form\Element\Textarea;
use Zend\Form\Element\Url;
use Zend\Form\Element\Email;
use Zend\Form\Element\Submit;
use Zend\Form\Element\Captcha;
use Zend\Captcha\Image as ImageCaptcha;

/**
 * Description of PostForm
 *
 * @author walter
 */
class PostForm extends Form 
{
    private $categories;
    private $date_expires;
    private $captcha_options;


    public function setCategories($categories)
    {
        $this->categories = $categories;
    }

    public function setCaptchaOptions($options)
    {
        $this->captcha_options = $options;
    }
    
    public function setDateExpires($date_expires)
    {
        $this->date_expires = $date_expires;
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
                    ['size'=>50, 'maxlenght' => 128, 'placeholder' => 'type the title']      
                );
        
        $priceMin = new Number("priceMin");
        $priceMin->setLabel("Price Minimum")
              ->setAttribute('size', 20);
        
        $priceMax = new Number("priceMax");
        $priceMax->setLabel("Price Maximum")
              ->setAttribute('size', 20);
        
        $date_expires = new Radio("date_expires");
        $date_expires->setLabel("Date expires")
                     ->setValueOptions($this->date_expires);
        
        $description = new Textarea("description");
        $description->setLabel("Description")
                ->setAttributes(
                        ['rows' => 5, 'cols' => 48]
                );
        
        $photo_filename = new Url("photo_filename");
        $photo_filename->setLabel("Photo")
                       ->setAttributes(
                               ["placeholder" => "type the URL", "size" => 50]
                        );
        
        $contact_name = new Text("contact_name");
        $contact_name->setLabel("Contact Name")
              ->setAttributes(
                    ['size'=>50, 'maxlenght' => 128, 'placeholder' => 'type the contact name']      
                );
                  
        $contact_email = new Email("contact_email");
        $contact_email->setLabel("Contact Email")
                      ->setAttributes(
                            ['size' => 50, 'maxlenght' => 128, 'placeholder' => 'type the contact email']
                      );
        
        $contact_phone = new Text("contact_phone");
        $contact_phone->setLabel("Contact Phone")
                      ->setAttributes(
                              ["size"=>20, "maxlenght" => 15, "placeholder" => "type the contact phone"]
                       );
        
        $city_code = new Select("city_code");
        $city_code->setLabel("City Code")
                  ->setValueOptions(array(""=>"Select..."));
        
        $country = new Text("country");
        $country->setLabel("Country")
                ->setAttributes(
                    ['size' => 20, 'disabled'=>'disabled']
                );
        
        $delete_code = new Number("delete_code");
        $delete_code->setLabel("Delete Code");
        
        $captcha = new Captcha('captcha');
        
        $captchaAdapter = new ImageCaptcha();
        $captchaAdapter->setWordlen(4)
                       ->setOptions($this->captcha_options);
        
        $captcha->setCaptcha($captchaAdapter)
                ->setLabel('Help us to prevent SPAM!')
                ->setAttribute('title', 'Help to prevent SPAM');
        
        $submit = new Submit("submit");
        $submit->setAttribute('value', 'Send');
        
        $this->add($category)
             ->add($title)
             ->add($priceMin)
             ->add($priceMax)
             ->add($date_expires)
             ->add($description)   
             ->add($photo_filename)   
             ->add($contact_name)   
             ->add($contact_email)   
             ->add($contact_phone)   
             ->add($city_code)   
             ->add($country)   
             ->add($delete_code)   
             ->add($captcha)
             ->add($submit);
    }
}
