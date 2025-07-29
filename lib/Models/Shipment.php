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

namespace Scayle\Cloud\AdminApi\Models;

/**
 * @property string $shopKey A key that uniquely identifies the shop within the tenant's ecosystem.
 * @property string $countryCode ISO 3166 alpha 2 country code; use shop country ID instead of country code when a country is ambiguous within a shop
 * @property string $carrier Defines the carrier key used, e.g. DHL
 * @property string $deliveryDate Defines the timestamp of the package leaving the warehouse
 * @property ShipmentOrderItem[] $items Collection of items shipped
 * @property int $orderId Unique identity of the order the shipment was part of
 * @property string $returnIdentCode Unique ID generated for product return (in case the customer prefers to return the product in later point of time)
 * @property string $shipmentKey A key that is assigned to uniquely identify a Shipment
 * @property string $merchantReferenceKey Reference key of the merchant to which the shipment belongs to.
 */
class Shipment extends ApiObject
{
    /** @var array<string, string> */
    protected array $defaultValues = [
    ];

    /** @var array<string, string> */
    protected array $classMap = [
    ];

    /** @var array<string, string> */
    protected array $collectionClassMap = [
        'items' => ShipmentOrderItem::class,
    ];

    /**
     * @var array<string, array{discriminator: string, mapping: array<string, string>}>
     */
    protected array $polymorphic = [
    ];

    /**
     * @var array<string, array{discriminator: string, mapping: array<string, string>}>
     */
    protected array $polymorphicCollections = [
    ];
}
