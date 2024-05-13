<?php

namespace AboutYou\Cloud\AdminApi;

use AboutYou\Cloud\AdminApi\Models\Identifier;
use AboutYou\Cloud\AdminApi\Models\Reservation;
use AboutYou\Cloud\AdminApi\Models\ReservationCollection;
use AboutYou\Cloud\AdminApi\Models\ReservationError;
use AboutYou\Cloud\AdminApi\Models\ReservationVariant;

/**
 * @internal
 */
final class ReservationTest extends BaseApiTestCase
{
    public function testCreate()
    {
        $expectedRequestJson = $this->loadFixture('ReservationCreateRequest.json');

        $requestEntity = [];
        foreach ($expectedRequestJson as $entity) {
            $requestEntity[] = new Reservation($entity);
        }

        $responseEntity = $this->api->reservations->create($requestEntity, []);

        $expectedResponseJson = $this->loadFixture('ReservationCreateResponse.json');
        self::assertInstanceOf(ReservationCollection::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'variant', ReservationVariant::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'error', ReservationError::class);

        foreach ($responseEntity->getEntities() as $collectionEntity) {
            self::assertInstanceOf(Reservation::class, $collectionEntity);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'variant', ReservationVariant::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'error', ReservationError::class);
        }
    }

    public function testDelete()
    {
        $responseEntity = $this->api->reservations->delete(Identifier::fromId(1), []);
    }
}
