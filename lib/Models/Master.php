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
 * @property string $referenceKey A key that uniquely identifies a group of products (e.g., all colors of a shirt) within the tenant's ecosystem.
 * @property ProductMasterCategories $categories The master categories all products of this group are attached to.
 * @property Attribute[] $attributes A list of attributes attached to the master.
 */
class Master extends ApiObject
{
    /** @var array<string, bool|string> */
    protected array $defaultValues = [
    ];

    /** @var array<string, string> */
    protected array $classMap = [
        'categories' => ProductMasterCategories::class,
    ];

    /** @var array<string, string> */
    protected array $collectionClassMap = [
        'attributes' => Attribute::class,
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
