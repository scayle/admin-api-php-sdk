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
 * @property string $key Unique identifier of the smart sorting key.
 * @property string $name Name of the smart sorting key.
 * @property string $description Optional description of the smart sorting key. Omitted in responses when null.
 * @property bool $isCustom Whether this is a custom smart sorting key. Always false for system keys.
 * @property SmartSortingKeyWeights $weights
 */
class SmartSortingKey extends ApiObject
{
    /** @var array<string, bool|string> */
    protected array $defaultValues = [];

    /** @var array<string, string> */
    protected array $classMap = [
        'weights' => SmartSortingKeyWeights::class,
    ];

    /** @var array<string, string> */
    protected array $collectionClassMap = [];

    /**
     * @var array<string, array{discriminator: string, mapping: array<string, string>}>
     */
    protected array $polymorphic = [];

    /**
     * @var array<string, array{discriminator: string, mapping: array<string, string>}>
     */
    protected array $polymorphicCollections = [];
}
