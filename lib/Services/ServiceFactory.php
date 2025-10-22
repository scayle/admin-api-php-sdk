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

namespace Scayle\Cloud\AdminApi\Services;

class ServiceFactory extends AbstractServiceFactory
{
    /** @var array<string, string> */
    protected array $classMap = [
        'products' => ProductService::class,
        'productsFirstLiveAts' => ProductsFirstLiveAtService::class,
        'masters' => MasterService::class,
        'productImages' => ProductImageService::class,
        'productVariants' => ProductVariantService::class,
        'productVariantPrices' => ProductVariantPriceService::class,
        'attributeTranslations' => AttributeTranslationService::class,
        'productVariantStocks' => ProductVariantStockService::class,
        'sellableWithoutStocks' => SellableWithoutStockService::class,
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
        'orderItems' => OrderItemService::class,
        'orderBillingStatuses' => OrderBillingStatusService::class,
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
        'promotionCodess' => PromotionCodesService::class,
        'promotionItemSets' => PromotionItemSetService::class,
        'promotionV1s' => PromotionV1Service::class,
        'promotions' => PromotionService::class,
        'audiences' => AudienceService::class,
        'reservations' => ReservationService::class,
        'redirects' => RedirectService::class,
        'emailKeys' => EmailKeyService::class,
        'emails' => EmailService::class,
        'bulkRequests' => BulkRequestService::class,
        'bulkRequestStatuses' => BulkRequestStatusService::class,
        'bulkOperationStatuses' => BulkOperationStatusService::class,
        'productSellableTimeframes' => ProductSellableTimeframeService::class,
        'channels' => ChannelService::class,
    ];
}
