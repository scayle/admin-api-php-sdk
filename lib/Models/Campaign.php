<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property int $id The ID of the campaign created by Backbone Core.
 * @property string $name Name of the campaign.
 * @property string $description Optional description of the campaign.
 * @property string[] $countryCodes List of country codes the campaign is valid for.
 * @property float $reduction The reduction percentage applied to all variants, which do not have a specific reduction set.
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
