<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property int $id The id of the shop category property key.
 * @property string $key The unique identifier of the shop category property key.
 * @property bool $isInheritable If true, then properties of the same key are inherited by children.
 */
class ShopCategoryPropertyKey extends ApiObject
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
