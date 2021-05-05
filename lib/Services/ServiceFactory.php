<?php

namespace AboutYou\Cloud\AdminApi\Services;

/**
 * Factory to create API services.
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
        'shopPropertyKeys' => \AboutYou\Cloud\AdminApi\Services\ShopPropertyKeyService::class,
        'attributeGroups' => \AboutYou\Cloud\AdminApi\Services\AttributeGroupService::class,
        'campaigns' => \AboutYou\Cloud\AdminApi\Services\CampaignService::class,
        'masterCategories' => \AboutYou\Cloud\AdminApi\Services\MasterCategoryService::class,
        'shopCategories' => \AboutYou\Cloud\AdminApi\Services\ShopCategoryService::class,
        'shopCategoryPropertyKeys' => \AboutYou\Cloud\AdminApi\Services\ShopCategoryPropertyKeyService::class,
        'shopCategoryProductSetUnlinkInstructions' => \AboutYou\Cloud\AdminApi\Services\ShopCategoryProductSetUnlinkInstructionService::class,
        'shopCountries' => \AboutYou\Cloud\AdminApi\Services\ShopCountryService::class,
        'brands' => \AboutYou\Cloud\AdminApi\Services\BrandService::class,
        'productSortings' => \AboutYou\Cloud\AdminApi\Services\ProductSortingService::class,
        'shopWarehouses' => \AboutYou\Cloud\AdminApi\Services\ShopWarehouseService::class,
        'packageGroups' => \AboutYou\Cloud\AdminApi\Services\PackageGroupService::class,
        'customDataConfigs' => \AboutYou\Cloud\AdminApi\Services\CustomDataConfigService::class,
    ];
}
