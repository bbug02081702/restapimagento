<?php

namespace Taimagento\Training\Api\Data;

/**
 * Interface CustomSearchResultInterface
 * @package Taimagento\Training\Api\Data
 */
interface LearnSearchResultInterface extends \Magento\Framework\Api\SearchResultsInterface
{
    /**
     * @return \Taimagento\Training\Api\Data\LearnInterface[]
     */
    public function getItems();

    /**
     * @param \Taimagento\Training\Api\Data\LearnInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}