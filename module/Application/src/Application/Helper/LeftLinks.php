<?php
namespace Application\Helper;

use Zend\View\Helper\AbstractHelper;

class LeftLinks extends AbstractHelper {
    public function __invoke(array $values, $urlPrefix) {
        
        $html = "<ul style='list-style:none;'>";
        PHP_EOL;
        foreach ($values as $item){
            $html .=  sprintf("<li><a href=\"%s/%s\">%s</a></li>", $urlPrefix, $item, $item);
        }
        PHP_EOL;
        
       $html .= "</ul>";
       
       return $html;
    }
}