<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property int $productId Backbone Core's internal product identifier.
 * @property string $productReferenceKey Tenant provided product identifier.
 * @property int $reduction The reduction percentage applied to all variants belonging to this product.
 */
class ProductCampaignReduction extends ApiObject
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