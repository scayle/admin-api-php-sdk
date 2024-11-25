<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property Reservation[] $entities
 */
class ReservationCollection extends ApiCollection
{
    protected $collectionClassMap = [
        'entities' => Reservation::class,
    ];

    /**
     * @return Reservation[]
     */
    public function getEntities()
    {
        return $this->entities;
    }
}
