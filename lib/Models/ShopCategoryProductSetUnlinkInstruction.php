<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property int[] $productSetIds IDs of the referencing product sets for which the reference to the stated product set should be unlinked.
 * @property bool $copyConditions Declares whether the conditions of the stated product set should be copied over to the referencing product sets.
 */
class ShopCategoryProductSetUnlinkInstruction extends ApiObject
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
