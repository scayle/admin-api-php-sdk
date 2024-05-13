<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property \AboutYou\Cloud\AdminApi\Models\Reservation[] $entities
 */
class ReservationCollection extends ApiCollection
{
    protected $collectionClassMap = [
        'entities' => Reservation::class,
    ];

    /**
     * @return \AboutYou\Cloud\AdminApi\Models\Reservation[]
     */
    public function getEntities()
    {
        return $this->entities;
    }
}
