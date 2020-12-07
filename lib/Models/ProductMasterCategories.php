<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property bool $isLocked Specifies if the product categories were locked via the Cloud Panel.
 * @property string[][] $paths The master category paths.
 */
class ProductMasterCategories extends ApiObject
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
