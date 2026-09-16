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
 * @property int $id ID of the ProductVideo assigned by SCAYLE.
 * @property string $referenceKey A key that uniquely identifies the video within the tenant's ecosystem.
 * @property string $assetUrl URL of the video, this will be set once the video has been uploaded.
 * @property mixed $format
 * @property bool $isUploaded Flag indicating whether the video has been uploaded.
 * @property Attribute[] $attributes A list of attributes attached to the video.
 * @property mixed $customData
 */
class ProductVideo extends ApiObject
{
    /** @var array<string, bool|string> */
    protected array $defaultValues = [];

    /** @var array<string, string> */
    protected array $classMap = [];

    /** @var array<string, string> */
    protected array $collectionClassMap = [
        'attributes' => Attribute::class,
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
