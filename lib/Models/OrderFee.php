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
 * @property OrderFeeAmount $amount If the order has an external price, this field becomes optional.
 * @property string $category Valid values in case of non-external order: [ payment, delivery, percentage_payment, return, additional]
 * If the order has an external price, this field becomes optional and can contain any string value defined by the client.
 * @property string $key If the order has an external price, this field becomes optional and can contain any string value defined by the client.
 * @property string $option
 * @property OrderTax $tax
 */
class OrderFee extends ApiObject
{
    /** @var array<string, bool|string> */
    protected array $defaultValues = [
    ];

    /** @var array<string, string> */
    protected array $classMap = [
        'amount' => OrderFeeAmount::class,
        'tax' => OrderTax::class,
    ];

    /** @var array<string, string> */
    protected array $collectionClassMap = [
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
