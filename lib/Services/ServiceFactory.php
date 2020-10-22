<?php

namespace AboutYou\Cloud\AdminApi\Services;

/**
 * Factory to create API services
 */
class ServiceFactory extends AbstractServiceFactory
{
	/**
	 * @var array<string, string>
     */
    protected $classMap = [
        'products' => \AboutYou\Cloud\AdminApi\Services\ProductService::class,
        'productImages' => \AboutYou\Cloud\AdminApi\Services\ProductImageService::class,
        'productVariants' => \AboutYou\Cloud\AdminApi\Services\ProductVariantService::class,
        'productVariantPrices' => \AboutYou\Cloud\AdminApi\Services\ProductVariantPriceService::class,
        'attributeTranslations' => \AboutYou\Cloud\AdminApi\Services\AttributeTranslationService::class,
        'productVariantStocks' => \AboutYou\Cloud\AdminApi\Services\ProductVariantStockService::class,
        'shops' => \AboutYou\Cloud\AdminApi\Services\ShopService::class,
        'attributeGroups' => \AboutYou\Cloud\AdminApi\Services\AttributeGroupService::class,
        'campaigns' => \AboutYou\Cloud\AdminApi\Services\CampaignService::class,
    ];
}