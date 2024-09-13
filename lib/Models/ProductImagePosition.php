<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property int $position Position of the image. Counting starts with 0, so when a product image should be on the first position, you have to send 0.
 */
class ProductImagePosition extends ApiObject
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
