<?php

namespace ALevel\PrivateCache\Block\Account\Dashboard;

use ALevel\PrivateCache\Api\Provider\CustomerBloodPointsProviderInterface;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;

class BloodPoints extends Template
{
    /** @var CustomerBloodPointsProviderInterface */
    private $provider;

    public function __construct(
        Context $context,
        CustomerBloodPointsProviderInterface $provider,
        array $data = []
    ) {
        $this->provider = $provider;
        parent::__construct($context, $data);
    }

    /**
     * @return int
     */
    public function getPoints() : int
    {
        return $this->provider->getCustomerBloodPoints();
    }
}
