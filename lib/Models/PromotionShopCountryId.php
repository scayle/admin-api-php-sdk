<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property int[] $allowList The list of shop IDs where the promotion is allowed
 * @property int[] $blockList The list of shop IDs where the promotion is blocked
 */
class PromotionShopCountryId extends ApiObject
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
