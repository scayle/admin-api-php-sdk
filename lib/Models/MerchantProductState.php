<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property string $merchantReferenceKey Reference key of the merchant to which the product belongs to.
 * @property string $state State of the merchant product.
 */
class MerchantProductState extends ApiObject
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
