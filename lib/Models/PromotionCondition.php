<?php

namespace AboutYou\Cloud\AdminApi\Models;

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
    protected $defaultValues = [
    ];

    protected $classMap = [
    ];

    protected $collectionClassMap = [
    ];

    protected $polymorphic = [
    ];

    protected $polymorphicCollections = [
    ];
}
