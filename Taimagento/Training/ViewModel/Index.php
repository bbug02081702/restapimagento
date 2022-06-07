<?php
namespace Taimagento\Training\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;
use Magento\Framework\Url\Helper\Data as UrlHelper;
use Taimagento\Training\Model\LearnFactory;

class Index implements ArgumentInterface
{
    /**
     * @var UrlHelper
     */
    private $urlHelper;

    public function __construct(
        UrlHelper $urlHelper,
        LearnFactory $learn
    )
    {
        $this->student_factory = $student_factory;
        parent::__construct($urlHelper);
    }

    public function getIndex()
    {
        $learn = $this->_learn->create();
        $model = $learn->getModel();
        return $model;
    }
}

