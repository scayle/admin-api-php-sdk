<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property int $id The ID of the contact created by SCAYLE.
 * @property string $name The name of the contact.
 * @property string $email The email of the contact.
 * @property string $phone The phone of the contact.
 * @property string $cellPhone The cell phone of the contact.
 * @property string $type The type of the contact.
 * @property string $position The position of the contact.
 * @property string $description The description of the contact.
 */
class MerchantContact extends ApiObject
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
