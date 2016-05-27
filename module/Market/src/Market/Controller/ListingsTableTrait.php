<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Market\Controller;

/**
 * Description of ListingsTableTrait
 *
 * @author leticia
 */
trait ListingsTableTrait {
    private $listingsTable;
    
    public function setListingsTable($listingsTable){
        $this->listingsTable = $listingsTable;
    }
}
