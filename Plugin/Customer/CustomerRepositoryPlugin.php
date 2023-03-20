<?php


namespace ALevel\PrivateCache\Plugin\Customer;

use ALevel\PrivateCache\Api\Provider\CustomerBloodPointsProviderInterface;
use Magento\Customer\Api\Data\CustomerExtensionFactory;
use Magento\Customer\Api\Data\CustomerExtensionInterface;
use Magento\Customer\Api\Data\CustomerInterface;
use Magento\Customer\Api\Data\CustomerSearchResultsInterface;
use Magento\Customer\Api\CustomerRepositoryInterface as Subject;

class CustomerRepositoryPlugin
{
    private $extensionFactory;

    public function __construct(CustomerExtensionFactory $customerExtensionFactory)
    {
        $this->extensionFactory = $customerExtensionFactory;
    }

    public function afterGet(
        Subject $customerRepository,
        CustomerInterface $customer
    ) {

    }

    public function afterGetList(
        Subject $customerRepository,
        CustomerSearchResultsInterface $customerSearchResults
    ) {

    }
}