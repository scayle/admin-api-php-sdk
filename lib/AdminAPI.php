<?php

namespace AboutYou\Cloud\AdminApi;

use AboutYou\Cloud\AdminApi\Services\ServiceFactory;

/**
 * Allows access to AdminApi functions.
 *
 * @property \AboutYou\Cloud\AdminApi\Services\ProductService $products
 * @property \AboutYou\Cloud\AdminApi\Services\MasterService $masters
 * @property \AboutYou\Cloud\AdminApi\Services\ProductImageService $productImages
 * @property \AboutYou\Cloud\AdminApi\Services\ProductVariantService $productVariants
 * @property \AboutYou\Cloud\AdminApi\Services\ProductVariantPriceService $productVariantPrices
 * @property \AboutYou\Cloud\AdminApi\Services\AttributeTranslationService $attributeTranslations
 * @property \AboutYou\Cloud\AdminApi\Services\ProductVariantStockService $productVariantStocks
 * @property \AboutYou\Cloud\AdminApi\Services\ShopService $shops
 * @property \AboutYou\Cloud\AdminApi\Services\AttributeGroupService $attributeGroups
 * @property \AboutYou\Cloud\AdminApi\Services\CampaignService $campaigns
 * @property \AboutYou\Cloud\AdminApi\Services\MasterCategoryService $masterCategories
 * @property \AboutYou\Cloud\AdminApi\Services\ShopCategoryService $shopCategories
 * @property \AboutYou\Cloud\AdminApi\Services\ShopCategoryPropertyKeyService $shopCategoryPropertyKeys
 * @property \AboutYou\Cloud\AdminApi\Services\ShopCategoryProductSetUnlinkInstructionService $shopCategoryProductSetUnlinkInstructions
 * @property \AboutYou\Cloud\AdminApi\Services\ShopCountryService $shopCountries
 * @property \AboutYou\Cloud\AdminApi\Services\BrandService $brands
 * @property \AboutYou\Cloud\AdminApi\Services\ProductSortingService $productSortings
 * @property \AboutYou\Cloud\AdminApi\Services\ShopCountryWarehouseService $shopCountryWarehouses
 * @property \AboutYou\Cloud\AdminApi\Services\ShopCountryPriceRoundingService $shopCountryPriceRoundings
 * @property \AboutYou\Cloud\AdminApi\Services\PackageGroupService $packageGroups
 * @property \AboutYou\Cloud\AdminApi\Services\CustomDataConfigService $customDataConfigs
 * @property \AboutYou\Cloud\AdminApi\Services\CustomerService $customers
 * @property \AboutYou\Cloud\AdminApi\Services\OrderService $orders
 * @property \AboutYou\Cloud\AdminApi\Services\ShipmentService $shipments
 * @property \AboutYou\Cloud\AdminApi\Services\WebhookEventService $webhookEvents
 * @property \AboutYou\Cloud\AdminApi\Services\WebhookSubscriptionService $webhookSubscriptions
 * @property \AboutYou\Cloud\AdminApi\Services\CancellationService $cancellations
 * @property \AboutYou\Cloud\AdminApi\Services\ReturnItemService $returnItems
 * @property \AboutYou\Cloud\AdminApi\Services\VoucherService $vouchers
 * @property \AboutYou\Cloud\AdminApi\Services\CompanyService $companies
 * @property \AboutYou\Cloud\AdminApi\Services\AssetService $assets
 * @property \AboutYou\Cloud\AdminApi\Services\CarrierService $carriers
 * @property \AboutYou\Cloud\AdminApi\Services\MerchantService $merchants
 * @property \AboutYou\Cloud\AdminApi\Services\WarehouseService $warehouses
 * @property \AboutYou\Cloud\AdminApi\Services\PromotionService $promotions
 * @property \AboutYou\Cloud\AdminApi\Services\AudienceService $audiences
 */
class AdminAPI extends AbstractApi
{
    /**
     * @var ServiceFactory
     */
    private $serviceFactory;

    public function __get($name)
    {
        if (null === $this->serviceFactory) {
            $this->serviceFactory = new ServiceFactory($this);
        }

        return $this->serviceFactory->get($name);
    }
}
