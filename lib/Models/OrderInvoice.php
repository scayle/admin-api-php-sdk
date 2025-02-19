<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property int $id PDF document id (different from invoice identifier)
 * @property string $createdAt
 * @property string $type Document types
 * @property Invoice $invoice
 * @property bool $available
 */
class OrderInvoice extends ApiObject
{
    protected $defaultValues = [
    ];

    protected $classMap = [
        'invoice' => Invoice::class,
    ];

    protected $collectionClassMap = [
    ];

    protected $polymorphic = [
    ];

    protected $polymorphicCollections = [
    ];
}
