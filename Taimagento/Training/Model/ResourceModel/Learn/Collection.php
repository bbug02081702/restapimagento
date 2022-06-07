<?php
namespace Taimagento\Training\Model\ResourceModel\Learn;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * Define model & resource model
     */
    protected function _construct()
    {
        $this->_init(
            '\Taimagento\Training\Model\Learn::class',
            '\Taimagento\Training\Model\ResourceModel\Learn::class'
        );
    }
}