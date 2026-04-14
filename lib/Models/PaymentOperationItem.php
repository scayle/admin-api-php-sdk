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
 * @property string $brand
 * @property int $bruttoDiscount
 * @property string $description
 * @property string $descriptionAddition
 * @property string $merchantProductId
 * @property int $nettoPrice
 * @property int $orderProductId
 * @property int $price
 * @property int $quantity
 * @property int $tax
 * @property int $undiscountedUnitPrice
 * @property int $unitPrice
 * @property int $unitPriceWithoutTaxWithVoucher
 * @property int $unitTaxValueWithVoucher
 * @property int $variantId
 * @property string $voucherCode
 */
class PaymentOperationItem extends ApiObject
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
