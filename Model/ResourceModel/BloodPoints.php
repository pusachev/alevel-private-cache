<?php


namespace ALevel\PrivateCache\Model\ResourceModel;


use ALevel\PrivateCache\Api\Data\BloodPointsInterface;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class BloodPoints extends AbstractDb
{
    protected function _construct()
    {
        $this->_init(
            BloodPointsInterface::TABLE_NAME,
            BloodPointsInterface::ID_FIELD_NAME
        );
    }
}
