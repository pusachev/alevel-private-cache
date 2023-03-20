<?php

namespace ALevel\PrivateCache\Api\Provider;

interface CustomerBloodPointsProviderInterface
{
    const FIELD_NAME = 'blood_points';

    public function getCustomerBloodPoints(): int;
}
