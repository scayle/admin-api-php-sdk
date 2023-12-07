<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property string $key Key of the condition. Can be used to identify which condition failed in the validate endpoint
 * @property string $condition
 */
class PromotionGlobalCondition extends ApiObject
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
