<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property int $id The ID of the master category created by SCAYLE.
 * @property int $parentId The ID of the parent master category if exists.
 * @property string[] $path The complete category path.
 * @property MasterCategoryAttribute[] $attributes List of attributes which are related to this category.
 */
class MasterCategory extends ApiObject
{
    protected $defaultValues = [
    ];

    protected $classMap = [
    ];

    protected $collectionClassMap = [
        'attributes' => \AboutYou\Cloud\AdminApi\Models\MasterCategoryAttribute::class,
    ];

    protected $polymorphic = [
    ];

    protected $polymorphicCollections = [
    ];
}
