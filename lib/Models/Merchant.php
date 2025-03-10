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
 * @property int $id The ID of the merchant created by SCAYLE.
 * @property string $referenceKey Reference key of the merchant.
 * @property string $name Name of the merchant.
 * @property int $priority Priority of the merchant.
 * @property string $orderDelegationUrl URL to send order delegation requests to the merchants.
 * @property string $cancellationUrl URL to send order cancellation requests.
 * @property MerchantContact[] $contacts A list of merchant contacts.
 * @property MerchantReturnAddress[] $returnAddresses A list of merchant return addresses.
 * @property MerchantCarrier[] $carriers A list of carriers attached to the merchant.
 * @property MerchantWarehouse[] $warehouses A list of warehouses attached to the merchant.
 */
class Merchant extends ApiObject
{
    /** @var array<string, string> */
    protected array $defaultValues = [
    ];

    /** @var array<string, string> */
    protected array $classMap = [
    ];

    /** @var array<string, string> */
    protected array $collectionClassMap = [
        'contacts' => MerchantContact::class,
        'returnAddresses' => MerchantReturnAddress::class,
        'carriers' => MerchantCarrier::class,
        'warehouses' => MerchantWarehouse::class,
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
