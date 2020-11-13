<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property int $id The id of the campaign created by Backbone Core.
 * @property string $name Name of the campaign.
 * @property string $description Optional description of the campaign.
 * @property string[] $shopKeys List of shop keys the campaign is assigned to.
 * @property float $reduction The reduction percentage applied to all variants, which don't have a specific reduction set.
 * @property string $startAt Start time of campaign in Iso8601 Zulu format.
 * @property string $endAt End time of campaign in Iso8601 Zulu format.
 */
class Campaign extends ApiObject
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
