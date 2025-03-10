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
 * @property int $id The ID of the return address created by SCAYLE.
 * @property string $name The name of the return address.
 * @property string $street The street name of the return address.
 * @property string $streetNo The street number of the return address.
 * @property string $zipCode The postal code of the return address.
 * @property string $city The city name of the return address.
 * @property string $countryCode ISO 3166 alpha 2 country code.
 * @property string $dhlCode The DHL code of the return address.
 */
class MerchantReturnAddress extends ApiObject
{
    /** @var array<string, string> */
    protected array $defaultValues = [
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
