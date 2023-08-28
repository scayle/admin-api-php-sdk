<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property int $id The ID of the carrier created by SCAYLE.
 * @property string $referenceKey Reference key of the carrier.
 * @property string $name Name of the carrier.
 * @property string $trackingUrl Tracking URL of the carrier.
 */
class Carrier extends ApiObject
{
    protected $defaultValues = [
    ];

    protected $classMap = [
    ];

    protected $collectionClassMap = [
    ];

    protected $polymorphic = [
    ];

    protected $polymorphicCollections = [
    ];
}
