<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property string $id Item Set id
 * @property string $name Name of the item set
 * @property int[] $variantIds A list of variant ids that belong to the item set
 * @property string $condition A Common Expression Language valid condition
 * @property int $eligibleItemsQuantity Specifies how many items need to be in a basket to form a group. The usage of this configuration depends on a promotion `max_count_type` configuration.
 */
class PromotionItemSet extends ApiObject
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
