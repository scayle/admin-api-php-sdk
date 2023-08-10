<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property AssetSource $source A source from where to upload an asset.
 */
class Asset extends ApiObject
{
    protected $defaultValues = [
    ];

    protected $classMap = [
        'source' => \AboutYou\Cloud\AdminApi\Models\AssetSource::class,
    ];

    protected $collectionClassMap = [
    ];

    protected $polymorphic = [
    ];

    protected $polymorphicCollections = [
    ];
}
