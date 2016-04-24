<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Market\Model;

use Zend\Db\TableGateway\TableGateway;

/**
 * Description of ListingsTable
 *
 * @author leticia
 */
class ListingsTable extends TableGateway {
    public static $tableName = 'listings';  
}
