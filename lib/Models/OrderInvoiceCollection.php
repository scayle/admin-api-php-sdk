<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property OrderInvoice[] $entities
 */
class OrderInvoiceCollection extends ApiCollection
{
    protected $collectionClassMap = [
        'entities' => OrderInvoice::class,
    ];

    /**
     * @return OrderInvoice[]
     */
    public function getEntities()
    {
        return $this->entities;
    }
}
