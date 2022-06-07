<?php
namespace Taimagento\Training\Block;

use Magento\Framework\View\Element\Template\Context;

class Index extends \Magento\Framework\View\Element\Template
{
    /** @var  \Taimagento\Training\Model\LearnFactory*/
    protected $Learn_factory;

    public function __construct(
        Context $context,
        \Taimagento\Training\Model\LearnFactory $Learn_factory
    )
    {
        $this->Learn_factory = $Learn_factory;
        parent::__construct($context);
    }


    public function getIndex()
    {
        $Learn =$this->getRequest()->getParam('ids');
        $result = $this->Learn_factory->create()->load($Learn);
        return $result;
    }
}