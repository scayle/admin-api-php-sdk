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
use Scayle\Cloud\AdminApi\Models\Identifier;
use Scayle\Cloud\AdminApi\Models\Reservation;
use Scayle\Cloud\AdminApi\Models\ReservationCollection;

class ReservationService extends AbstractService
{
    /**
     * @param Reservation[] $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function create(
        array $model,
        array $options = []
    ): ReservationCollection {
        return $this->request(
            method: 'post',
            relativeUrl: $this->resolvePath('/reservations'),
            query: $options,
            headers: [],
            modelClass: ReservationCollection::class,
            body: $model
        );
    }

    /**
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function delete(
        Identifier $reservationIdentifier,
        array $options = []
    ): void {
        $this->request(
            method: 'delete',
            relativeUrl: $this->resolvePath('/reservations/%s', $reservationIdentifier),
            query: $options,
            headers: [],
            modelClass: null,
            body: null
        );
    }
}
