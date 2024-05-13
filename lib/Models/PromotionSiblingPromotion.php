<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property bool $enabled
 * @property string[] $allowList The list of promotion ids that can be applied together with this promotion
 * @property string[] $blockList The list of promotion ids that can not be applied together with this promotion
 * @property string $level The level on which promotion is applied
 */
class PromotionSiblingPromotion extends ApiObject
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
