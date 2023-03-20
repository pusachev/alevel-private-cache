<?php


namespace ALevel\PrivateCache\Api\Repository;


use ALevel\PrivateCache\Api\Data\BloodPointsInterface;
use Magento\Framework\Api\SearchCriteriaInterface;

interface BloodPointsRepositoryInterface
{
    public function getById(int $pointsId) : BloodPointsInterface;

    public function get(int $customerId): BloodPointsInterface;

    public function getList(SearchCriteriaInterface $searchCriteria): BloodPointsRepositoryInterface;

    public function save(BloodPointsInterface $bloodPoints): BloodPointsRepositoryInterface;

    public function delete(BloodPointsInterface $bloodPoints): BloodPointsRepositoryInterface;

    public function deleteById(int $pointsId) : BloodPointsRepositoryInterface;
}
