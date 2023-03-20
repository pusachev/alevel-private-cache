<?php

namespace ALevel\PrivateCache\Repository;

use Psr\Log\LoggerInterface;

use ALevel\PrivateCache\Api\Data\BloodPointsInterface;
use ALevel\PrivateCache\Api\Data\BloodPointsInterfaceFactory;
use ALevel\PrivateCache\Api\Repository\BloodPointsRepositoryInterface;
use ALevel\PrivateCache\Model\ResourceModel\BloodPoints as ResourceModel;
use ALevel\PrivateCache\Model\ResourceModel\BloodPoints\Collection;
use ALevel\PrivateCache\Model\ResourceModel\BloodPoints\CollectionFactory;

use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchResultsInterface;
use Magento\Framework\Api\SearchResultsInterfaceFactory;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;


class BloodPointsRepository implements BloodPointsRepositoryInterface
{
    private $resourceModel;

    private $modelFactory;

    private $collectionFactory;

    private $searchResultsFactory;

    private $collectionProcessor;

    private $logger;

    public function __construct(
        ResourceModel $resourceModel,
        BloodPointsInterfaceFactory $bloodPointsFactory,
        CollectionFactory $collectionFactory,
        SearchResultsInterfaceFactory $searchResultsFactory,
        CollectionProcessorInterface $collectionProcessor,
        LoggerInterface $logger
    ) {
        $this->resourceModel = $resourceModel;
        $this->modelFactory = $bloodPointsFactory;
        $this->collectionFactory = $collectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->collectionProcessor = $collectionProcessor;
        $this->logger = $logger;
    }

    public function getById(int $pointsId): BloodPointsInterface
    {
        /** @var BloodPointsInterface $model */
        $model = $this->modelFactory->create();

        $this->resourceModel->load($model, $pointsId);

        if (empty($model->getId())) {
            throw new NoSuchEntityException(__("Points not found"));
        }

        return $model;

    }

    public function get(int $customerId): BloodPointsInterface
    {
        /** @var BloodPointsInterface $model */
        $model = $this->modelFactory->create();

        $this->resourceModel->load($model, $customerId, BloodPointsInterface::CUSTOMER_ID_FIELD_NAME);

        if (empty($model->getId())) {
            throw new NoSuchEntityException(__("Points not found"));
        }

        return $model;
    }

    public function getList(SearchCriteriaInterface $searchCriteria): BloodPointsRepositoryInterface
    {
        $collection = $this->collectionFactory->create();

        $this->collectionProcessor->process($searchCriteria, $collection);

        $searchResult = $this->searchResultsFactory->create();
        $searchResult->setTotalCount($collection->getSize());
        $searchResult->setItems($collection->getItems());

        return $searchResult;
    }

    public function save(BloodPointsInterface $bloodPoints): BloodPointsRepositoryInterface
    {
        try {
            $this->resourceModel->save($bloodPoints);
        } catch (\Exception $exception) {
            $this->logger->error($exception->getMessage(), ['exception' => $exception]);
            throw new CouldNotSaveException(__("Points can\'t save"));
        }
    }

    public function delete(BloodPointsInterface $bloodPoints): BloodPointsRepositoryInterface
    {
        try {
            $this->resourceModel->delete($bloodPoints);
        } catch (\Exception $exception) {
            $this->logger->error($exception->getMessage(), ['exception' => $exception]);
            throw new CouldNotDeleteException(__("Points can\'t delete"));
        }
    }

    public function deleteById(int $pointsId): BloodPointsRepositoryInterface
    {
        try {
            $points = $this->getById($pointsId);
            $this->delete($pointsId);
        } catch (NoSuchEntityException $e) {
            $this->logger->info("Points alredy delete");
        }
    }
}
