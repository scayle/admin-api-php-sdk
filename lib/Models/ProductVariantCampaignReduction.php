<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property int $id SCAYLE's internal reduction identifier.
 * @property int $productVariantId SCAYLE's internal product variant identifier.
 * @property string $productVariantReferenceKey Tenant provided product variant identifier.
 * @property int $reduction The reduction percentage applied to this specific variant.
 */
class ProductVariantCampaignReduction extends ApiObject
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
