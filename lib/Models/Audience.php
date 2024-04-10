<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property string $id Audience id
 * @property string $name Internal name of the audience
 * @property string $description Internal description of the audience
 * @property int[] $companyIds The list of company ids where the audience takes place
 * @property int[] $customerIds The list of customer ids
 * @property string $createdAt Created at date
 * @property string $updatedAt Updated at date
 */
class Audience extends ApiObject
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
