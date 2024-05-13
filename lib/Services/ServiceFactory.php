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
        'products' => ProductService::class,
        'masters' => MasterService::class,
        'productImages' => ProductImageService::class,
        'productVariants' => ProductVariantService::class,
        'productVariantPrices' => ProductVariantPriceService::class,
        'attributeTranslations' => AttributeTranslationService::class,
        'productVariantStocks' => ProductVariantStockService::class,
        'shops' => ShopService::class,
        'attributeGroups' => AttributeGroupService::class,
        'campaigns' => CampaignService::class,
        'masterCategories' => MasterCategoryService::class,
        'shopCategories' => ShopCategoryService::class,
        'shopCategoryPropertyKeys' => ShopCategoryPropertyKeyService::class,
        'shopCategoryProductSetUnlinkInstructions' => ShopCategoryProductSetUnlinkInstructionService::class,
        'shopCountries' => ShopCountryService::class,
        'brands' => BrandService::class,
        'productSortings' => ProductSortingService::class,
        'shopCountryWarehouses' => ShopCountryWarehouseService::class,
        'shopCountryPriceRoundings' => ShopCountryPriceRoundingService::class,
        'packageGroups' => PackageGroupService::class,
        'customDataConfigs' => CustomDataConfigService::class,
        'customers' => CustomerService::class,
        'orders' => OrderService::class,
        'shipments' => ShipmentService::class,
        'webhookEvents' => WebhookEventService::class,
        'webhookSubscriptions' => WebhookSubscriptionService::class,
        'cancellations' => CancellationService::class,
        'returnItems' => ReturnItemService::class,
        'vouchers' => VoucherService::class,
        'companies' => CompanyService::class,
        'assets' => AssetService::class,
        'carriers' => CarrierService::class,
        'merchants' => MerchantService::class,
        'warehouses' => WarehouseService::class,
        'promotionV1s' => PromotionV1Service::class,
        'promotions' => PromotionService::class,
        'audiences' => AudienceService::class,
    ];
}
