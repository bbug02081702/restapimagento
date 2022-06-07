<?php

namespace Taimagento\Training\Controller\Index;

use Magento\Framework\App\Action\Context;

class IndexApi extends \Magento\Framework\App\Action\Action
{
    protected $LearnRepository;

    public function __construct(
        \Taimagento\Training\Model\LearnRepository $LearnRepository,
        Context $context
    ) {
        $this->LearnRepository = $LearnRepository;
        parent::__construct($context);
    }

    public function execute()
    {
        $a = $this->LearnRepository->getById(1);
        echo "<pre>";
        var_dump($a->getData());
        echo "</pre>";
    }
}