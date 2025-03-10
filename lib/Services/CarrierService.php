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

namespace Scayle\Cloud\AdminApi\Services;

use Psr\Http\Client\ClientExceptionInterface;
use Scayle\Cloud\AdminApi\Exceptions\ApiErrorException;
use Scayle\Cloud\AdminApi\Models\Carrier;
use Scayle\Cloud\AdminApi\Models\CarrierCollection;
use Scayle\Cloud\AdminApi\Models\Identifier;

class CarrierService extends AbstractService
{
    /**
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function all(
        array $options = []
    ): CarrierCollection {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/carriers'),
            query: $options,
            headers: [],
            modelClass: CarrierCollection::class,
            body: null
        );
    }

    /**
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function get(
        Identifier $carrierIdentifier,
        array $options = []
    ): Carrier {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/carriers/%s', $carrierIdentifier),
            query: $options,
            headers: [],
            modelClass: Carrier::class,
            body: null
        );
    }

    /**
     * @param Carrier $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function create(
        Carrier $model,
        array $options = []
    ): Carrier {
        return $this->request(
            method: 'post',
            relativeUrl: $this->resolvePath('/carriers'),
            query: $options,
            headers: [],
            modelClass: Carrier::class,
            body: $model
        );
    }

    /**
     * @param Carrier $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function update(
        Identifier $carrierIdentifier,
        Carrier $model,
        array $options = []
    ): Carrier {
        return $this->request(
            method: 'put',
            relativeUrl: $this->resolvePath('/carriers/%s', $carrierIdentifier),
            query: $options,
            headers: [],
            modelClass: Carrier::class,
            body: $model
        );
    }
}
