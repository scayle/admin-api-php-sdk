<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property string $warehouseReferenceKey Reference key of warehouse for which the stock update is related to.
 * @property bool $sellableWithoutStock Defines if the variant can be sold even when the available stock is 0.
 * @property string $merchantReferenceKey A merchant reference key the stock belongs to.
 */
class SellableWithoutStock extends ApiObject
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
