<?php

namespace AboutYou\Cloud\AdminApi\Services;

use AboutYou\Cloud\AdminApi\Exceptions\ApiErrorException;
use AboutYou\Cloud\AdminApi\Models\Identifier;
use AboutYou\Cloud\AdminApi\Models\ReservationCollection;
use Psr\Http\Client\ClientExceptionInterface;

class ReservationService extends AbstractService
{
    /**
     * @param \AboutYou\Cloud\AdminApi\Models\Reservation[] $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @return ReservationCollection
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function create($model, $options = [])
    {
        return $this->request(
            'post',
            $this->resolvePath('/reservations'),
            $options,
            [],
            ReservationCollection::class,
            $model
        );
    }

    /**
     * @param Identifier $reservationIdentifier
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function delete($reservationIdentifier, $options = [])
    {
        $this->request(
            'delete',
            $this->resolvePath('/reservations/%s', $reservationIdentifier),
            $options,
            [],
            null,
            null
        );
    }
}
