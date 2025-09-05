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
 * @property int $id Numeric primary key generated during creation.
 * @property string $key Slug short key to identify the channel. Not allowed to be modified after channel is used for an order.
 * @property string $type Not allowed to be modified after channel is used for an order.
 * @property string $name Custom name of the channel.
 * @property string $description Optional description about the channel in text format.
 * @property ShopCountry $shopCountry
 * @property DefaultPaymentMethodResponse $defaultPaymentMethod
 * @property bool $active If set to false, the channel cannot be used during external order creation.
 * @property bool $isUsedInOrders Shows if the channel is already used in orders.
 * @property ChannelConfigsWithDefaults $configs
 * @property string $createdAt The date and time when the channel was created.
 * @property string $updatedAt The date and time when the channel was last updated.
 */
class Channel extends ApiObject
{
    /** @var array<string, bool|string> */
    protected array $defaultValues = [
        'active' => true,
    ];

    /** @var array<string, string> */
    protected array $classMap = [
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
