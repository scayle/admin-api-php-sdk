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

use Scayle\Cloud\AdminApi\Models\Customer;
use Scayle\Cloud\AdminApi\Models\Identifier;
use Scayle\Cloud\AdminApi\Models\Order;
use Scayle\Cloud\AdminApi\Models\OrderAddress;
use Scayle\Cloud\AdminApi\Models\OrderBillingStatus;
use Scayle\Cloud\AdminApi\Models\OrderContact;
use Scayle\Cloud\AdminApi\Models\OrderCost;
use Scayle\Cloud\AdminApi\Models\OrderDetailedStatus;
use Scayle\Cloud\AdminApi\Models\OrderItem;
use Scayle\Cloud\AdminApi\Models\OrderLoyaltyCard;
use Scayle\Cloud\AdminApi\Models\OrderMembershipDiscount;
use Scayle\Cloud\AdminApi\Models\OrderPackage;
use Scayle\Cloud\AdminApi\Models\OrderPayment;
use Scayle\Cloud\AdminApi\Models\OrderShipping;
use Scayle\Cloud\AdminApi\Models\OrderVoucher;
use Scayle\Cloud\AdminApi\Models\ShopCountry;

/**
 * @internal
 */
final class OrderBillingStatusTest extends BaseApiTestCase
{
    public function testUpdateOrderBillingStatus(): void
    {
        $expectedRequestJson = $this->loadFixture('OrderBillingStatusUpdateOrderBillingStatusRequest.json');

        $requestEntity = new OrderBillingStatus($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->orderBillingStatuses->updateOrderBillingStatus('acme', 'acme', Identifier::fromId(1), $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('OrderBillingStatusUpdateOrderBillingStatusResponse.json');
        self::assertInstanceOf(Order::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'vouchers', OrderVoucher::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'shipping', OrderShipping::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'payment', OrderPayment::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'items', OrderItem::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'customer', Customer::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'contacts', OrderContact::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'cost', OrderCost::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'address', OrderAddress::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'membershipDiscount', OrderMembershipDiscount::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'packages', OrderPackage::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'shopCountry', ShopCountry::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'loyaltyCard', OrderLoyaltyCard::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'detailedStatus', OrderDetailedStatus::class);



    }
}
