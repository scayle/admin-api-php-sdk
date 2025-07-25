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
 * @property string $additional
 * @property string $city
 * @property string $countryCode
 * @property string $firstName
 * @property bool $forwardToCollectionPoint
 * @property string $gender Gender of the customer mentioned as per defined ENUM as "m" , "f", "d", "n"
 * @property string $houseNumber
 * @property string $lastName
 * @property 1|string $phone
 * @property string $state
 * @property string $street
 * @property string $title
 * @property string $zipCode
 * @property SubscriptionOrderAddressInstanceParcelShop $parcelShop
 */
class SubscriptionOrderAddressInstance extends ApiObject
{
    /** @var array<string, string> */
    protected array $defaultValues = [
    ];

    /** @var array<string, string> */
    protected array $classMap = [
        'parcelShop' => SubscriptionOrderAddressInstanceParcelShop::class,
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
