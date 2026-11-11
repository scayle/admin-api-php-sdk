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
 * @property int $id Identifier of the product quality score rule.
 * @property bool $isDefault Whether this is the default ruleset.
 * @property ProductQualityScoreRuleEntry[] $rules Attribute group weights stored on this ruleset.
 * @property int[] $masterCategoryIds Master category ids that own this ruleset. Only categories with
 * `isInherited` false are listed, in ascending id. Empty when the ruleset
 * has no owners.
 * @property string $createdAt Timestamp when the ruleset was created.
 * @property string $updatedAt Timestamp when the ruleset was last updated.
 */
class ProductQualityScoreRule extends ApiObject
{
    /** @var array<string, bool|string> */
    protected array $defaultValues = [];

    /** @var array<string, string> */
    protected array $classMap = [];

    /** @var array<string, string> */
    protected array $collectionClassMap = [
        'rules' => ProductQualityScoreRuleEntry::class,
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
