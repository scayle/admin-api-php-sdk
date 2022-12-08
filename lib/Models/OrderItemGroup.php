<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property string $id Item group ID
 * @property bool $isMainItem Specifies the main item in the group (true for only one item in a group)
 * @property bool $isRequired Specifies if the item is mandatory or optional
 */
class OrderItemGroup extends ApiObject
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
