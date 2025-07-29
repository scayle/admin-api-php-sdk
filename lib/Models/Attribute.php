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
 * @property string $name The attribute name.
 * @property string $type The attribute type.
 * @property mixed $value The attribute value where the datatype is defined by the type property.
 * @property bool $isLocked Specifies if the attribute was locked via SCAYLE Panel.
 * @property AttributeShopCountrySpecific[] $shopCountrySpecific Used to override the attribute value for a specific shop country. Only supported by products, product masters and variants.
 */
class Attribute extends ApiObject
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
