<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property int $id
 * @property string $key
 * @property string $type If the 'shopCategoryId' key is utilized, it should be associated with a 'country' type of application rather than 'shop'.
 * @property mixed[] $value
 */
class VoucherCriterion extends ApiObject
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
