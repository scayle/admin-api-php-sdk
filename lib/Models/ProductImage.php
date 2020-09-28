<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property int $id 
 * @property string $referenceKey A key that uniquely identifies the asset within the tenant's ecosystem.
 * @property string $name Name of the image
 * @property string $mimeType 
 * @property int $position Position of the image
 * @property ProductImageSource $source 
 * @property string $assetUrl If not using a AY Cloud CDN, the asset url can be manually set.
 * @property SimpleAttribute[]|SimpleAttributeList[] $attributes 
 */
class ProductImage extends ApiObject
{
    protected $defaultValues = [
        
    ];

    protected $classMap = [
		'source' => \AboutYou\Cloud\AdminApi\Models\ProductImageSource::class,
    ];

    protected $collectionClassMap = [
    ];

    protected $polymorphic = [
    ];

    protected $polymorphicCollections = [
        'attributes' => [
            'discriminator' => 'type',
            'mapping' => [
                    'simple' => \AboutYou\Cloud\AdminApi\Models\SimpleAttribute::class,
                    'simpleList' => \AboutYou\Cloud\AdminApi\Models\SimpleAttributeList::class,
            ]
        ],
    ];
}