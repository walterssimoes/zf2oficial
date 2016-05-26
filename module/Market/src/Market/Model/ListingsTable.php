<?php
namespace Market\Model;


use Zend\Db\TableGateway;
/**
 * Description of ListingsTable
 *
 * @author walter
 */
class ListingsTable extends TableGateway {
    public static $tableName = 'listings';


    public function getListingsByCategory($category = null)
    {
        return $this->select(['category' => $category]);
    }
}
