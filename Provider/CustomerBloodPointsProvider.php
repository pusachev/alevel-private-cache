<?php

namespace ALevel\PrivateCache\Provider;

use ALevel\PrivateCache\Api\Provider\CustomerBloodPointsProviderInterface;
use ALevel\PrivateCache\Api\Repository\BloodPointsRepositoryInterface;
use Magento\Customer\Model\ResourceModel\CustomerRepository;
use Magento\Framework\App\Http\Context;
use Magento\Customer\Model\Context as CustomerContext;
use Magento\Customer\Model\SessionFactory;
use Magento\Framework\Exception\NoSuchEntityException;

class CustomerBloodPointsProvider implements CustomerBloodPointsProviderInterface
{
    private $repository;

    private $context;

    private $sessionFactory;

    public function __construct(
        Context $context,
        BloodPointsRepositoryInterface $repository,
        SessionFactory $sessionFactory
    ) {
        $this->context = $context;
        $this->repository = $repository;
        $this->sessionFactory = $sessionFactory;
    }

    public function getCustomerBloodPoints(): int
    {
        if (!$this->context->getValue(CustomerContext::CONTEXT_AUTH)) {
            return 0;
        }

        $customer = $this->sessionFactory->create();

        try {
            $bloodPoints = $this->repository->get($customer->getId());
        } catch (NoSuchEntityException $e) {
            return 0;
        }

        return (int) mt_rand(0, 1000000);
    }
}

