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
 * @property int $id Document id (distinct from order identifiers).
 * @property bool $availabilityStatus Whether the document content can be fetched.
 * @property string $createdAt
 * @property string $format File format of the document (`pdf` for PDF binaries, `eml` for email messages).
 * @property string $type Document category. PDF-backed types (for example `merchant_partial_invoice`) return PDF bytes from the show endpoint, same as [order invoices](/en/core-documentation/checkout-guide/features/transactions-and-orders#get-order-invoice).
 * Email-backed types (for example `email_shipment`) are built from JSON stored at the document's storage path and returned as `message/rfc822`.
 */
class OrderDocument extends ApiObject
{
    /** @var array<string, bool|string> */
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
