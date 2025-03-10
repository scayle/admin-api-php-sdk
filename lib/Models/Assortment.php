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
 * @property MasterCategoryAssortmentConfiguration $masterCategories Configuration of master category includes/excludes.
 * @property ProductAssortmentConfiguration $products Configuration of product includes/excludes.
 * @property AttributeAssortmentConfiguration[] $attributes Configuration of attribute includes/excludes.
 * @property MerchantAssortmentConfiguration $merchantReferenceKeys Configuration of merchant includes/excludes.
 */
class Assortment extends ApiObject
{
    /** @var array<string, string> */
    protected array $defaultValues = [
    ];

    /** @var array<string, string> */
    protected array $classMap = [
        'masterCategories' => MasterCategoryAssortmentConfiguration::class,
        'products' => ProductAssortmentConfiguration::class,
        'merchantReferenceKeys' => MerchantAssortmentConfiguration::class,
    ];

    /** @var array<string, string> */
    protected array $collectionClassMap = [
        'attributes' => AttributeAssortmentConfiguration::class,
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
