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

use Scayle\Cloud\AdminApi\Models\OrderItem;
use Scayle\Cloud\AdminApi\Models\OrderItemDeliveryForecast;
use Scayle\Cloud\AdminApi\Models\OrderItemGroup;
use Scayle\Cloud\AdminApi\Models\OrderItemLowestPriorPrice;
use Scayle\Cloud\AdminApi\Models\OrderItemMerchant;
use Scayle\Cloud\AdminApi\Models\OrderItemPrice;
use Scayle\Cloud\AdminApi\Models\OrderItemProduct;
use Scayle\Cloud\AdminApi\Models\OrderItemPromotion;
use Scayle\Cloud\AdminApi\Models\OrderItemVariant;

/**
 * @internal
 */
final class OrderItemTest extends BaseApiTestCase
{
    public function testCreateOrUpdateLegacyCustomData(): void
    {
        $expectedRequestJson = $this->loadFixture('OrderItemCreateOrUpdateLegacyCustomDataRequest.json');

        $requestEntity = $expectedRequestJson;

        $responseEntity = $this->api->orderItems->createOrUpdateLegacyCustomData('acme', 'acme', 1, 1, $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('OrderItemCreateOrUpdateLegacyCustomDataResponse.json');
        self::assertInstanceOf(OrderItem::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'deliveryForecast', OrderItemDeliveryForecast::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'price', OrderItemPrice::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'lowestPriorPrice', OrderItemLowestPriorPrice::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'product', OrderItemProduct::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'promotion', OrderItemPromotion::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'variant', OrderItemVariant::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'itemGroup', OrderItemGroup::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'merchant', OrderItemMerchant::class);



    }
}
