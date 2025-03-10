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
 * @property int $id The ID of the campaign created by SCAYLE.
 * @property string $name Name of the campaign.
 * @property string $description Optional description of the campaign.
 * @property string[] $countryCodes List of country codes the campaign is valid for.
 * @property float $reduction The reduction percentage applied to all variants, which do not have a specific reduction set.
 * @property string $startAt Start time of campaign in Iso8601 format.
 * @property string $endAt End time of campaign in Iso8601 format.
 * @property string $campaignKey A specific key to identify the campaign. If not provided, it will be generated by SCAYLE.
 * @property mixed $customData
 */
class Campaign extends ApiObject
{
    /** @var array<string, string> */
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
