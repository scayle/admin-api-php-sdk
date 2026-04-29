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
 * @property string $requestUrl Callback url, which will be triggered when request status is changed
 * @property string $operationUrl Callback url, which will be triggered when operation status is changed
 * @property string $requestStatus Status of the bulk request creation
 * @property int $bulkRequestKey Key indicating the bulk request id. To split a bulk request into multiple chunks, create the request with requestStatus=incomplete, then pass the returned key as bulkRequestKey when submitting additional chunks. For the final chunk, pass the same bulkRequestKey and set requestStatus=complete so the request can be queued for processing. Completed bulk requests cannot be extended. When extending a bulk request, operation keys that were already submitted in previous chunks are not checked again. When not provided, a new bulk request is created.
 */
class BulkRequestCallbacks extends ApiObject
{
    /** @var array<string, bool|string> */
    protected array $defaultValues = [
        'requestStatus' => 'complete',
    ];

    /** @var array<string, string> */
    protected array $classMap = [];

    /** @var array<string, string> */
    protected array $collectionClassMap = [];

    /**
     * @var array<string, array{discriminator: string, mapping: array<string, string>}>
     */
    protected array $polymorphic = [];

    /**
     * @var array<string, array{discriminator: string, mapping: array<string, string>}>
     */
    protected array $polymorphicCollections = [];
}
