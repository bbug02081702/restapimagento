<?php

namespace Taimagento\Training\Block;

use Magento\Framework\View\Element\Template\Context;
use Taimagento\Training\Model\LearnFactory;

class TestListData extends \Magento\Framework\View\Element\Template
{
    public function __construct(
        Context $context,
        LearnFactory $learn
    ) {
        $this->_learn = $learn;
        parent::__construct($context);
    }

    public function _prepareLayout()
    {
        $this->pageConfig->getTitle()->set(__('Page show student list'));
        
        return parent::_prepareLayout();
    }

    public function getTestCollection()
    {
        $learn = $this->_learn->create();
        $collection = $learn->getCollection();
        return $collection;
    }
}