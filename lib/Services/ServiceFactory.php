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
        'masters' => \AboutYou\Cloud\AdminApi\Services\MasterService::class,
        'productImages' => \AboutYou\Cloud\AdminApi\Services\ProductImageService::class,
        'productVariants' => \AboutYou\Cloud\AdminApi\Services\ProductVariantService::class,
        'productVariantPrices' => \AboutYou\Cloud\AdminApi\Services\ProductVariantPriceService::class,
        'attributeTranslations' => \AboutYou\Cloud\AdminApi\Services\AttributeTranslationService::class,
        'productVariantStocks' => \AboutYou\Cloud\AdminApi\Services\ProductVariantStockService::class,
        'shops' => \AboutYou\Cloud\AdminApi\Services\ShopService::class,
        'attributeGroups' => \AboutYou\Cloud\AdminApi\Services\AttributeGroupService::class,
        'campaigns' => \AboutYou\Cloud\AdminApi\Services\CampaignService::class,
        'masterCategories' => \AboutYou\Cloud\AdminApi\Services\MasterCategoryService::class,
        'shopCategories' => \AboutYou\Cloud\AdminApi\Services\ShopCategoryService::class,
        'shopCategoryPropertyKeys' => \AboutYou\Cloud\AdminApi\Services\ShopCategoryPropertyKeyService::class,
        'shopCategoryProductSetUnlinkInstructions' => \AboutYou\Cloud\AdminApi\Services\ShopCategoryProductSetUnlinkInstructionService::class,
        'shopCountries' => \AboutYou\Cloud\AdminApi\Services\ShopCountryService::class,
        'brands' => \AboutYou\Cloud\AdminApi\Services\BrandService::class,
        'productSortings' => \AboutYou\Cloud\AdminApi\Services\ProductSortingService::class,
        'shopCountryWarehouses' => \AboutYou\Cloud\AdminApi\Services\ShopCountryWarehouseService::class,
        'shopCountryPriceRoundings' => \AboutYou\Cloud\AdminApi\Services\ShopCountryPriceRoundingService::class,
        'packageGroups' => \AboutYou\Cloud\AdminApi\Services\PackageGroupService::class,
        'customDataConfigs' => \AboutYou\Cloud\AdminApi\Services\CustomDataConfigService::class,
        'customers' => \AboutYou\Cloud\AdminApi\Services\CustomerService::class,
        'orders' => \AboutYou\Cloud\AdminApi\Services\OrderService::class,
        'shipments' => \AboutYou\Cloud\AdminApi\Services\ShipmentService::class,
        'webhookEvents' => \AboutYou\Cloud\AdminApi\Services\WebhookEventService::class,
        'webhookSubscriptions' => \AboutYou\Cloud\AdminApi\Services\WebhookSubscriptionService::class,
        'cancellations' => \AboutYou\Cloud\AdminApi\Services\CancellationService::class,
        'returnItems' => \AboutYou\Cloud\AdminApi\Services\ReturnItemService::class,
        'vouchers' => \AboutYou\Cloud\AdminApi\Services\VoucherService::class,
        'companies' => \AboutYou\Cloud\AdminApi\Services\CompanyService::class,
        'assets' => \AboutYou\Cloud\AdminApi\Services\AssetService::class,
        'carriers' => \AboutYou\Cloud\AdminApi\Services\CarrierService::class,
        'merchants' => \AboutYou\Cloud\AdminApi\Services\MerchantService::class,
        'warehouses' => \AboutYou\Cloud\AdminApi\Services\WarehouseService::class,
        'promotions' => \AboutYou\Cloud\AdminApi\Services\PromotionService::class,
    ];
}
