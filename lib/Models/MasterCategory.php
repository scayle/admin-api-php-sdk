<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property int $id The id of the master category created by Backbone Core.
 * @property int $parentId The id of the parent master category if exists.
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
