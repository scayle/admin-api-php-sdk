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
 * @property PartialMasterCategoryAssortmentConfiguration $masterCategories
 * @property PartialProductAssortmentConfiguration $products
 * @property PartialAttributeAssortmentConfiguration[] $attributes Configuration of attribute includes/excludes.
 * @property PartialMerchantAssortmentConfiguration $merchantReferenceKeys
 */
class PartialAssortment extends ApiObject
{
    /** @var array<string, bool|string> */
    protected array $defaultValues = [
    ];

    /** @var array<string, string> */
    protected array $classMap = [
        'masterCategories' => PartialMasterCategoryAssortmentConfiguration::class,
        'products' => PartialProductAssortmentConfiguration::class,
        'merchantReferenceKeys' => PartialMerchantAssortmentConfiguration::class,
    ];

    /** @var array<string, string> */
    protected array $collectionClassMap = [
        'attributes' => PartialAttributeAssortmentConfiguration::class,
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
