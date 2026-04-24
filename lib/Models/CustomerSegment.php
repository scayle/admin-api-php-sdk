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
 * @property string $guid Unique identifier of the segment.
 * @property string $referenceKey Business-facing identifier.
 * @property string $name Display name of the segment.
 * @property string $criteriaDsl Criteria DSL defining the segment rules (e.g. `"TIER-A" IN groups AND LTV > 1000`).
 * @property int $rules The number of conditions in the criteriaDsl.
 * @property bool $active Whether the segment is active.
 * @property string $createdDate
 * @property string $updatedDate
 */
class CustomerSegment extends ApiObject
{
    /** @var array<string, bool|string> */
    protected array $defaultValues = [];

    /** @var array<string, string> */
    protected array $classMap = [];

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
