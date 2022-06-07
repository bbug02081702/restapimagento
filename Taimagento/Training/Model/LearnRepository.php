<?php
//tham khao web vimagento
namespace Taimagento\Training\Model;

use Taimagento\Training\Api\Data\LearnInterface;
use Taimagento\Training\Model\ResourceModel\Learn\Collection;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SortOrder;

/**
 * Class CustomManagement
 * @package Taimagento\Training\Model
 */
class LearnRepository implements \Taimagento\Training\Api\LearnRepositoryInterface
{
    /**
     * @var \Taimagento\Training\Model\LearnFactory
     */
    protected $LearnFactory;

    /**
     * @var ResourceModel\Learn
     */
    protected $LearnResource;

    /**
     * @var ResourceModel\Learn\CollectionFactory
     */
    protected $collectionFactory;

    /**
     * @var \Taimagento\Training\Api\Data\LearnSearchResultInterfaceFactory
     */
    protected $searchResultInterfaceFactory;

    /**
     * CustomRepository constructor.
     * @param \Taimagento\Training\Model\LearnFactory $LearnFactory
     * @param ResourceModel\Learn $LearnResource
     * @param ResourceModel\Learn\CollectionFactory $collectionFactory
     * @param \Taimagento\Training\Api\Data\LearnSearchResultInterfaceFactory $searchResultInterfaceFactory
     */
    public function __construct(
        \Taimagento\Training\Model\LearnFactory $LearnFactory,
        \Taimagento\Training\Model\ResourceModel\Learn $LearnResource,
        \Taimagento\Training\Model\ResourceModel\Learn\CollectionFactory $collectionFactory,
        \Taimagento\Training\Api\Data\LearnSearchResultInterfaceFactory $searchResultInterfaceFactory
    ) {
        $this->LearnFactory = $LearnFactory;
        $this->LearnResource = $LearnResource;
        $this->collectionFactory = $collectionFactory;
        $this->searchResultInterfaceFactory = $searchResultInterfaceFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function getById($id)
    {
        $LearnModel = $this->LearnFactory->create();
        $this->LearnResource->load($LearnModel, $id);
        if (!$LearnModel->getEntityId()) {
            throw new NoSuchEntityException(__('Unable to find custom data with ID "%1"', $id));
        }
        return $LearnModel;
    }

    /**
     * {@inheritdoc}
     */
    public function save(LearnInterface $learn)
    {
        $this->LearnResource->save($learn);
        return $learn;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById($id)
    {
        try {
            $LearnModel = $this->LearnFactory->create();
            $this->LearnResource->load($LearnModel, $id);
            $this->LearnResource->delete($LearnModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(
                __('Could not delete the entry: %1', $exception->getMessage())
            );
        }

        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function getList(SearchCriteriaInterface $searchCriteria)
    {
        $collection = $this->collectionFactory->create();

        $this->addFiltersToCollection($searchCriteria, $collection);
        $this->addSortOrdersToCollection($searchCriteria, $collection);
        $this->addPagingToCollection($searchCriteria, $collection);

        $collection->load();

        return $this->buildSearchResult($searchCriteria, $collection);
    }

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @param Collection $collection
     */
    private function addFiltersToCollection(SearchCriteriaInterface $searchCriteria, Collection $collection)
    {
        foreach ($searchCriteria->getFilterGroups() as $filterGroup) {
            $fields = $conditions = [];
            foreach ($filterGroup->getFilters() as $filter) {
                $fields[] = $filter->getField();
                $conditions[] = [$filter->getConditionType() => $filter->getValue()];
            }
            $collection->addFieldToFilter($fields, $conditions);
        }
    }

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @param Collection $collection
     */
    private function addSortOrdersToCollection(SearchCriteriaInterface $searchCriteria, Collection $collection)
    {
        foreach ((array)$searchCriteria->getSortOrders() as $sortOrder) {
            $direction = $sortOrder->getDirection() == SortOrder::SORT_ASC ? 'asc' : 'desc';
            $collection->addOrder($sortOrder->getField(), $direction);
        }
    }

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @param Collection $collection
     */
    private function addPagingToCollection(SearchCriteriaInterface $searchCriteria, Collection $collection)
    {
        $collection->setPageSize($searchCriteria->getPageSize());
        $collection->setCurPage($searchCriteria->getCurrentPage());
    }

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @param Collection $collection
     * @return mixed
     */
    private function buildSearchResult(SearchCriteriaInterface $searchCriteria, Collection $collection)
    {
        $searchResults = $this->searchResultInterfaceFactory->create();

        $searchResults->setSearchCriteria($searchCriteria);
        $searchResults->setItems($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());

        return $searchResults;
    }
}
