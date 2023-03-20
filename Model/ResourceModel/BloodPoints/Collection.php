<?php


namespace ALevel\PrivateCache\Model\ResourceModel\BloodPoints;

use ALevel\PrivateCache\Model\Data\BloodPoints as Model;
use ALevel\PrivateCache\Model\ResourceModel\BloodPoints as ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(Model::class, ResourceModel::class);
    }
}
