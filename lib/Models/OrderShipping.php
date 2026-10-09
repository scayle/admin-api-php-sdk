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
 * @property string $policy
 * @property string $carrierGroup Carrier group selected for this order, e.g. `dhl`. Send this value back as `carrier.carrierGroup` when creating a follow-up order. This is a carrier group, not a carrier code. `packages[].carrierKey` is the carrier shipping a package and must not be replayed here. Absent when the order has no carrier group recorded.
 * @property string $deliveredOn
 * @property int $deliveryCosts If the order has an external price, this field will not be included in the response payload.
 * @property int $deliveryCostsWithoutDiscount Original delivery costs before free-shipping or other shipping discounts. If the order has an external price, this field will not be included in the response payload.
 * @property int $expressDeliveryCosts If the order has an external price, this field will not be included in the response payload.
 * @property int $expressDeliveryCostsWithoutDiscount Original express delivery costs before free-shipping or other shipping discounts. If the order has an external price, this field will not be included in the response payload.
 */
class OrderShipping extends ApiObject
{
    /** @var array<string, bool|string> */
    protected array $defaultValues = [];

    /** @var array<string, string> */
    protected array $classMap = [];

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
