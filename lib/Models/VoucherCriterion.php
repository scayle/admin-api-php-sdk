<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property int $id
 * @property string $key
 * @property string $type In case shopCategoryId key used that should be corresponded for country type of application instead of shop.
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
