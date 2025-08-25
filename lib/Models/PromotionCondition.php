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
 * @property string $level The list of conditions ('payload.*') that determines whether the promotion is applicable or not.
 * If `level = global`, a condition ('payload.*') that determines whether the promotion is applicable or not.
 * If `level = item`, a conditions ('item.*') that determines whether promotion is applicable or not for a particular item.
 * @property string $key Key of the condition. Can be used to identify which condition failed in the validate endpoint
 * @property string $condition A Common Expression Language valid condition.
 *
 * Available replacements keys:
 * `{{thisPromotionId}}` - will be replace on current promotion id, example:
 * ```
 * "payload.customData.promotions.exists(i, i == '{{thisPromotionId}}')"
 * ```
 */
class PromotionCondition extends ApiObject
{
    /** @var array<string, bool|string> */
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
