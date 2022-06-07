<?php

namespace Taimagento\Training\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Taimagento\Training\Api\Data\LearnInterface;

/**
 * Interface CustomManagementInterface
 * @package Taimagento\Training\Api
 */
interface LearnRepositoryInterface
{
    /**
     * @param int $id
     * @return \Taimagento\Training\Api\Data\LearnInterface
     */
    public function getById($id);

    /**
     * @param \Taimagento\Training\Api\Data\LearnInterface $taimagento
     * @return \Taimagento\Training\Api\Data\LearnInterface
     */
    public function save(LearnInterface $taimagento);

    /**
     * @param int $id
     * @return bool
     */
    public function deleteById($id);

    /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Taimagento\Training\Api\Data\LearnSearchResultInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria);
}