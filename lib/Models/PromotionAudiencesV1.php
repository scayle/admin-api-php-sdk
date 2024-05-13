<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property string[] $allowList The list of audience ids that can use this promotion
 * @property string[] $blockList The list of audience ids that can not use this promotion
 */
class PromotionAudiencesV1 extends ApiObject
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
