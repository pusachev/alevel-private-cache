<?php

namespace ALevel\PrivateCache\Model\Data;

use ALevel\PrivateCache\Api\Data\BloodPointsInterface;
use ALevel\PrivateCache\Model\ResourceModel\BloodPoints as ResourceModel;
use Magento\Framework\Model\AbstractModel;

class BloodPoints extends AbstractModel implements BloodPointsInterface
{
    public function getCustomerId(): int
    {
        return $this->getData(self::CUSTOMER_ID_FIELD_NAME);
    }

    public function setCustomerId(int $customerId): BloodPointsInterface
    {
        $this->setData(self::CUSTOMER_ID_FIELD_NAME, $customerId);

        return $this;
    }

    public function getPoints(): int
    {
        return $this->getData(self::POINTS_FIELD_NAME);
    }

    public function setPoints(int $points)
    {
        $this->setData(self::POINTS_FIELD_NAME, $points);

        return $this;
    }

    protected function _construct()
    {
        $this->_init(ResourceModel::class);
    }
}

