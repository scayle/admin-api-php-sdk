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

namespace Scayle\Cloud\AdminApi;

use Scayle\Cloud\AdminApi\Models\Identifier;
use Scayle\Cloud\AdminApi\Models\Reservation;
use Scayle\Cloud\AdminApi\Models\ReservationCollection;
use Scayle\Cloud\AdminApi\Models\ReservationError;
use Scayle\Cloud\AdminApi\Models\ReservationVariant;

/**
 * @internal
 */
final class ReservationTest extends BaseApiTestCase
{
    public function testCreate(): void
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

    public function testDelete(): void
    {
        $this->api->reservations->delete(Identifier::fromId(1), []);

        // @phpstan-ignore staticMethod.alreadyNarrowedType
        self::assertTrue(true, 'Reached end of test');
    }
}
