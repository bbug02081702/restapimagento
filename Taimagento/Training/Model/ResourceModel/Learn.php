<?php
namespace Taimagento\Training\Model\ResourceModel;
class Learn extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     * Define main table
     */
    protected function _construct()
    {
        $this->_init('students', 'entity_id');   
    }
}