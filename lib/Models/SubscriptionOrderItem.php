<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property array $additionalData
 * @property string $categoryName
 * @property SubscriptionOrderItemInitial $initial
 * @property OrderItemGroup $itemGroup
 * @property SubscriptionOrderItemPromotion $promotion
 * @property int $variantId
 */
class SubscriptionOrderItem extends ApiObject
{
    protected $defaultValues = [
    ];

    protected $classMap = [
        'initial' => SubscriptionOrderItemInitial::class,
        'itemGroup' => OrderItemGroup::class,
        'promotion' => SubscriptionOrderItemPromotion::class,
    ];

    protected $collectionClassMap = [
    ];

    protected $polymorphic = [
    ];

    protected $polymorphicCollections = [
    ];
}
