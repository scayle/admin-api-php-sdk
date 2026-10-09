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
 * @property string $shippingPolicyKey
 * @property string $carrierGroup Carrier group name, e.g. `dhl`, exactly as returned in `shipping.carrierGroup` on an order response. Required, but not marked as required, so existing clients can keep sending deprecated `carrierKey`. One of `carrierGroup` or `carrierKey` must be set. When set, it takes precedence over `carrierKey`. Must match a carrier group configured for this shop and shipping policy.
 * @property string $carrierKey Deprecated, use `carrierGroup`. Mapped to `carrierGroup` when `carrierGroup` is omitted. Despite its name this must be a carrier group name, e.g. `dhl`, and not a carrier code, e.g. `DHL_STD_NATIONAL`. Ignored when `carrierGroup` is present.
 * @property SubscriptionOrderCarrierDeliveryDate $deliveryDate
 */
class SubscriptionOrderCarrier extends ApiObject
{
    /** @var array<string, bool|string> */
    protected array $defaultValues = [];

    /** @var array<string, string> */
    protected array $classMap = [
        'deliveryDate' => SubscriptionOrderCarrierDeliveryDate::class,
    ];

    /** @var array<string, string> */
    protected array $collectionClassMap = [];

    /**
     * @var array<string, array{discriminator: string, mapping: array<string, string>}>
     */
    protected array $polymorphic = [];

    /**
     * @var array<string, array{discriminator: string, mapping: array<string, string>}>
     */
    protected array $polymorphicCollections = [];
}
