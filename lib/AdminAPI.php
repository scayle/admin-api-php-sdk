<?php

declare(strict_types=1);

/*
 * This file is part of the AdminAPI PHP SDK provided by SCAYLE GmbH.
 *
 * (c) SCAYLE GmbH <https://www.scayle.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Scayle\Cloud\AdminApi;

use Scayle\Cloud\AdminApi\Services\AssetService;
use Scayle\Cloud\AdminApi\Services\AttributeGroupService;
use Scayle\Cloud\AdminApi\Services\AttributeTranslationService;
use Scayle\Cloud\AdminApi\Services\AudienceService;
use Scayle\Cloud\AdminApi\Services\BrandService;
use Scayle\Cloud\AdminApi\Services\BulkOperationStatusService;
use Scayle\Cloud\AdminApi\Services\BulkRequestService;
use Scayle\Cloud\AdminApi\Services\BulkRequestStatusService;
use Scayle\Cloud\AdminApi\Services\CampaignService;
use Scayle\Cloud\AdminApi\Services\CancellationService;
use Scayle\Cloud\AdminApi\Services\CarrierService;
use Scayle\Cloud\AdminApi\Services\CompanyService;
use Scayle\Cloud\AdminApi\Services\CustomDataConfigService;
use Scayle\Cloud\AdminApi\Services\CustomerService;
use Scayle\Cloud\AdminApi\Services\EmailKeyService;
use Scayle\Cloud\AdminApi\Services\EmailService;
use Scayle\Cloud\AdminApi\Services\MasterCategoryService;
use Scayle\Cloud\AdminApi\Services\MasterService;
use Scayle\Cloud\AdminApi\Services\MerchantService;
use Scayle\Cloud\AdminApi\Services\OrderItemService;
use Scayle\Cloud\AdminApi\Services\OrderService;
use Scayle\Cloud\AdminApi\Services\PackageGroupService;
use Scayle\Cloud\AdminApi\Services\ProductImageService;
use Scayle\Cloud\AdminApi\Services\ProductSellableTimeframeService;
use Scayle\Cloud\AdminApi\Services\ProductService;
use Scayle\Cloud\AdminApi\Services\ProductsFirstLiveAtService;
use Scayle\Cloud\AdminApi\Services\ProductSortingService;
use Scayle\Cloud\AdminApi\Services\ProductVariantPriceService;
use Scayle\Cloud\AdminApi\Services\ProductVariantService;
use Scayle\Cloud\AdminApi\Services\ProductVariantStockService;
use Scayle\Cloud\AdminApi\Services\PromotionCodesService;
use Scayle\Cloud\AdminApi\Services\PromotionItemSetService;
use Scayle\Cloud\AdminApi\Services\PromotionService;
use Scayle\Cloud\AdminApi\Services\PromotionV1Service;
use Scayle\Cloud\AdminApi\Services\RedirectService;
use Scayle\Cloud\AdminApi\Services\ReservationService;
use Scayle\Cloud\AdminApi\Services\ReturnItemService;
use Scayle\Cloud\AdminApi\Services\SellableWithoutStockService;
use Scayle\Cloud\AdminApi\Services\ServiceFactory;
use Scayle\Cloud\AdminApi\Services\ShipmentService;
use Scayle\Cloud\AdminApi\Services\ShopCategoryProductSetUnlinkInstructionService;
use Scayle\Cloud\AdminApi\Services\ShopCategoryPropertyKeyService;
use Scayle\Cloud\AdminApi\Services\ShopCategoryService;
use Scayle\Cloud\AdminApi\Services\ShopCountryPriceRoundingService;
use Scayle\Cloud\AdminApi\Services\ShopCountryService;
use Scayle\Cloud\AdminApi\Services\ShopCountryWarehouseService;
use Scayle\Cloud\AdminApi\Services\ShopService;
use Scayle\Cloud\AdminApi\Services\VoucherService;
use Scayle\Cloud\AdminApi\Services\WarehouseService;
use Scayle\Cloud\AdminApi\Services\WebhookEventService;
use Scayle\Cloud\AdminApi\Services\WebhookSubscriptionService;

/**
 * Allows access to AdminApi functions.
 *
 * @property ProductService $products
 * @property ProductsFirstLiveAtService $productsFirstLiveAts
 * @property MasterService $masters
 * @property ProductImageService $productImages
 * @property ProductVariantService $productVariants
 * @property ProductVariantPriceService $productVariantPrices
 * @property AttributeTranslationService $attributeTranslations
 * @property ProductVariantStockService $productVariantStocks
 * @property SellableWithoutStockService $sellableWithoutStocks
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
 * @property OrderItemService $orderItems
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
 * @property PromotionCodesService $promotionCodess
 * @property PromotionItemSetService $promotionItemSets
 * @property PromotionV1Service $promotionV1s
 * @property PromotionService $promotions
 * @property AudienceService $audiences
 * @property ReservationService $reservations
 * @property RedirectService $redirects
 * @property EmailKeyService $emailKeys
 * @property EmailService $emails
 * @property BulkRequestService $bulkRequests
 * @property BulkRequestStatusService $bulkRequestStatuses
 * @property BulkOperationStatusService $bulkOperationStatuses
 * @property ProductSellableTimeframeService $productSellableTimeframes
 */
class AdminAPI extends AbstractApi
{
    private ServiceFactory $serviceFactory;

    /**
     * @phpstan-ignore missingType.return
     */
    public function __get(string $name)
    {
        if (!isset($this->serviceFactory)) {
            $this->serviceFactory = new ServiceFactory($this);
        }

        return $this->serviceFactory->get($name);
    }
}
