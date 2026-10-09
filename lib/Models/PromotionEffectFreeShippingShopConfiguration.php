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
 * @property bool $isExternal Whether this shop is external.
 * An external shop does not use internal shipping options, so `shippingOptions` may be omitted.
 * An internal shop (`false` or unset) grants free shipping only for the options listed in `shippingOptions`.
 * @property int $shopCountryId Shop country ID this configuration applies to. Must be one of the promotion shop country IDs.
 * @property PromotionEffectFreeShippingOption[] $shippingOptions Shipping options this promotion makes free for an internal shop.
 * When present, the list must contain at least one option.
 * Required for an internal shop; omit it for an external shop.
 */
class PromotionEffectFreeShippingShopConfiguration extends ApiObject
{
    /** @var array<string, bool|string> */
    protected array $defaultValues = [];

    /** @var array<string, string> */
    protected array $classMap = [];

    /** @var array<string, string> */
    protected array $collectionClassMap = [
        'shippingOptions' => PromotionEffectFreeShippingOption::class,
    ];

    /**
     * @var array<string, array{discriminator: string, mapping: array<string, string>}>
     */
    protected array $polymorphic = [];

    /**
     * @var array<string, array{discriminator: string, mapping: array<string, string>}>
     */
    protected array $polymorphicCollections = [];
}
