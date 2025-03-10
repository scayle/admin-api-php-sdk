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
 * @property int $bulkRequestKey Key indicating the bulk request id. By passing this bulkRequestKey with requestStatus=incomplete, the operations of that bulk request can be extended. When extending the bulk operations, same operation key that may exists in the previous bulk requests will not be checked. Extending the operations of an already completed request is not possible. When not provided a new bulk request is created.
 */
class BulkRequestCallbacks extends ApiObject
{
    /** @var array<string, string> */
    protected array $defaultValues = [
        'requestStatus' => 'complete',
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
