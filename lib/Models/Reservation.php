<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property int $id
 * @property string $referenceKey
 * @property string $warehouseReferenceKey
 * @property ReservationVariant $variant
 * @property ReservationError $error
 */
class Reservation extends ApiObject
{
    protected $defaultValues = [
    ];

    protected $classMap = [
        'variant' => ReservationVariant::class,
        'error' => ReservationError::class,
    ];

    protected $collectionClassMap = [
    ];

    protected $polymorphic = [
    ];

    protected $polymorphicCollections = [
    ];
}
