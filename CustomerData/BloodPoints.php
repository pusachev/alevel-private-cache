<?php


namespace ALevel\PrivateCache\CustomerData;

use ALevel\PrivateCache\Api\Provider\CustomerBloodPointsProviderInterface;
use ALevel\PrivateCache\Provider\CustomerBloodPointsProvider;
use Magento\Customer\CustomerData\SectionSourceInterface;

class BloodPoints implements SectionSourceInterface
{
    private $provider;

    public function __construct(CustomerBloodPointsProviderInterface $provider)
    {
        $this->provider = $provider;
    }

    public function getSectionData()
    {
        return [
            'points' => $this->provider->getCustomerBloodPoints()
        ];
    }
}
