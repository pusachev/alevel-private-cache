<?php


namespace ALevel\PrivateCache\Api\Data;


interface BloodPointsInterface
{
    const TABLE_NAME = 'alevel_blood_points';

    const ID_FIELD_NAME = 'points_id';
    const CUSTOMER_ID_FIELD_NAME = 'customer_id';
    const POINTS_FIELD_NAME = 'points';

    public function getId();

    public function getCustomerId() : int;

    public function setCustomerId(int $customerId) : BloodPointsInterface;

    public function getPoints() : int;

    public function setPoints(int $points);
}