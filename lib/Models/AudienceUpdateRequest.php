<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property string $name Internal name of the audience
 * @property string $description Internal description of the audience
 * @property int[] $customerIds The list of customer ids
 */
class AudienceUpdateRequest extends ApiObject
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
