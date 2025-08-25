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
 * @property int $id The ID of the shop category.
 * @property int $parentId The ID of the parent shop category.
 * @property int $leftSiblingId The ID of the left sibling shop category. It defines the shop category position in the category tree.
 * @property array<string> $name The localized category name.
 * @property ShopCategoryProductSet[] $productSets Product sets define which products to include in the shop category.
 * @property string[] $supportedFilterGroups List of supported filter groups.
 * @property ShopCategoryProperty[] $properties The properties assigned to the shop category. Can be specified on creation only.
 * @property bool $isActive Declares whether the shop category is active or not. Can be specified on creation only.
 * @property bool $isVisible Declares whether the shop category is visible in the shop or not. Can be specified on creation only.
 * @property bool $isExcludedFromSearch Declares whether the shop category should be excluded from search.
 * @property mixed $customData Arbitrary fields assigned to shop categories
 * @property ShopCategoryCountry[] $countries List of country specific configurations.
 */
class ShopCategory extends ApiObject
{
    /** @var array<string, bool|string> */
    protected array $defaultValues = [
    ];

    /** @var array<string, string> */
    protected array $classMap = [
    ];

    /** @var array<string, string> */
    protected array $collectionClassMap = [
        'productSets' => ShopCategoryProductSet::class,
        'properties' => ShopCategoryProperty::class,
        'countries' => ShopCategoryCountry::class,
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
