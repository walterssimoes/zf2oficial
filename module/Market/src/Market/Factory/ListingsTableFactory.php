<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Market\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Market\Model\ListingsTable;
/**
 * Description of ListingsTableFactory
 *
 * @author leticia
 */
class ListingsTableFactory implements FactoryInterface{
    public function createService(ServiceLocatorInterface $sm) {
        return new ListingsTable(ListingsTable::$tableName, $sm->get('general-adapter'));
    }
}
