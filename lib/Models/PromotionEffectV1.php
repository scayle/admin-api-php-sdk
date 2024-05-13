<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property string $id Type of the promotion
 * @property array $additionalData Additional data of the promotion effect, max_count_type and eligible_items_quantity are optional
 */
class PromotionEffectV1 extends ApiObject
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
