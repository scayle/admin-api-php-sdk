<?php

namespace AboutYou\Cloud\AdminApi;

use AboutYou\Cloud\AdminApi\Services\AssetService;
use AboutYou\Cloud\AdminApi\Services\AttributeGroupService;
use AboutYou\Cloud\AdminApi\Services\AttributeTranslationService;
use AboutYou\Cloud\AdminApi\Services\AudienceService;
use AboutYou\Cloud\AdminApi\Services\BrandService;
use AboutYou\Cloud\AdminApi\Services\CampaignService;
use AboutYou\Cloud\AdminApi\Services\CancellationService;
use AboutYou\Cloud\AdminApi\Services\CarrierService;
use AboutYou\Cloud\AdminApi\Services\CompanyService;
use AboutYou\Cloud\AdminApi\Services\CustomDataConfigService;
use AboutYou\Cloud\AdminApi\Services\CustomerService;
use AboutYou\Cloud\AdminApi\Services\MasterCategoryService;
use AboutYou\Cloud\AdminApi\Services\MasterService;
use AboutYou\Cloud\AdminApi\Services\MerchantService;
use AboutYou\Cloud\AdminApi\Services\OrderService;
use AboutYou\Cloud\AdminApi\Services\PackageGroupService;
use AboutYou\Cloud\AdminApi\Services\ProductImageService;
use AboutYou\Cloud\AdminApi\Services\ProductService;
use AboutYou\Cloud\AdminApi\Services\ProductSortingService;
use AboutYou\Cloud\AdminApi\Services\ProductVariantPriceService;
use AboutYou\Cloud\AdminApi\Services\ProductVariantService;
use AboutYou\Cloud\AdminApi\Services\ProductVariantStockService;
use AboutYou\Cloud\AdminApi\Services\PromotionService;
use AboutYou\Cloud\AdminApi\Services\PromotionV1Service;
use AboutYou\Cloud\AdminApi\Services\ReservationService;
use AboutYou\Cloud\AdminApi\Services\ReturnItemService;
use AboutYou\Cloud\AdminApi\Services\ServiceFactory;
use AboutYou\Cloud\AdminApi\Services\ShipmentService;
use AboutYou\Cloud\AdminApi\Services\ShopCategoryProductSetUnlinkInstructionService;
use AboutYou\Cloud\AdminApi\Services\ShopCategoryPropertyKeyService;
use AboutYou\Cloud\AdminApi\Services\ShopCategoryService;
use AboutYou\Cloud\AdminApi\Services\ShopCountryPriceRoundingService;
use AboutYou\Cloud\AdminApi\Services\ShopCountryService;
use AboutYou\Cloud\AdminApi\Services\ShopCountryWarehouseService;
use AboutYou\Cloud\AdminApi\Services\ShopService;
use AboutYou\Cloud\AdminApi\Services\VoucherService;
use AboutYou\Cloud\AdminApi\Services\WarehouseService;
use AboutYou\Cloud\AdminApi\Services\WebhookEventService;
use AboutYou\Cloud\AdminApi\Services\WebhookSubscriptionService;

/**
 * Allows access to AdminApi functions.
 *
 * @property ProductService $products
 * @property MasterService $masters
 * @property ProductImageService $productImages
 * @property ProductVariantService $productVariants
 * @property ProductVariantPriceService $productVariantPrices
 * @property AttributeTranslationService $attributeTranslations
 * @property ProductVariantStockService $productVariantStocks
 * @property ShopService $shops
 * @property AttributeGroupService $attributeGroups
 * @property CampaignService $campaigns
 * @property MasterCategoryService $masterCategories
 * @property ShopCategoryService $shopCategories
 * @property ShopCategoryPropertyKeyService $shopCategoryPropertyKeys
 * @property ShopCategoryProductSetUnlinkInstructionService $shopCategoryProductSetUnlinkInstructions
 * @property ShopCountryService $shopCountries
 * @property BrandService $brands
 * @property ProductSortingService $productSortings
 * @property ShopCountryWarehouseService $shopCountryWarehouses
 * @property ShopCountryPriceRoundingService $shopCountryPriceRoundings
 * @property PackageGroupService $packageGroups
 * @property CustomDataConfigService $customDataConfigs
 * @property CustomerService $customers
 * @property OrderService $orders
 * @property ShipmentService $shipments
 * @property WebhookEventService $webhookEvents
 * @property WebhookSubscriptionService $webhookSubscriptions
 * @property CancellationService $cancellations
 * @property ReturnItemService $returnItems
 * @property VoucherService $vouchers
 * @property CompanyService $companies
 * @property AssetService $assets
 * @property CarrierService $carriers
 * @property MerchantService $merchants
 * @property WarehouseService $warehouses
 * @property PromotionV1Service $promotionV1s
 * @property PromotionService $promotions
 * @property AudienceService $audiences
 * @property ReservationService $reservations
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
