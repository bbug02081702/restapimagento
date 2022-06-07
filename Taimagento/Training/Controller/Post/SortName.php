<?php
namespace Taimagento\Training\Controller\Post;
 

use Magento\Framework\App\Action\Action;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\Action\Context;
use Taimagento\Training\Model\ResourceModel\Learn\CollectionFactory;
 
class SortName extends Action
{
    protected $PageFactory;
    protected $PostsFactory;
 
    public function __construct(Context $context, PageFactory $pageFactory, CollectionFactory $postsFactory)
    {
        parent::__construct($context);
        $this->PageFactory = $pageFactory;
        $this->PostsFactory = $postsFactory;
    }
 
    public function execute()
    {
       
        $this->PostsFactory->create();
        $collection = $this->PostsFactory->create()
        ->addFieldToSelect(array('name'))
        ->setOrder('name','DSC');     
        echo '<pre>';
        print_r($collection->getData());
        echo '<pre>';
        
    }
}
// hien thi sap xep theo thu tu giam dan voi "name" trong table students


