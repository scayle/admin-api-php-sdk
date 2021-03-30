<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property string $name The attribute name.
 * @property string $type The attribute type.
 * @property bool $isMandatory Whether the attribute is mandatory or not. Used in the state *calculation*.
 * @property mixed $defaultValue The default value of the attribute if it is mandatory. Used in all attribute related processes if that specific attribute is not provided.
 */
class MasterCategoryAttribute extends ApiObject
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
