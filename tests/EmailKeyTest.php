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

use Scayle\Cloud\AdminApi\Models\EmailKey;
use Scayle\Cloud\AdminApi\Models\EmailKeyCollection;

/**
 * @internal
 */
final class EmailKeyTest extends BaseApiTestCase
{
    public function testCreate(): void
    {
        $expectedRequestJson = $this->loadFixture('EmailKeyCreateRequest.json');

        $requestEntity = new EmailKey($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->emailKeys->create('acme', 'acme', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('EmailKeyCreateResponse.json');
        self::assertInstanceOf(EmailKey::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());




    }

    public function testUpdate(): void
    {
        $expectedRequestJson = $this->loadFixture('EmailKeyUpdateRequest.json');

        $requestEntity = new EmailKey($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->emailKeys->update('acme', 'acme', 1, $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('EmailKeyUpdateResponse.json');
        self::assertInstanceOf(EmailKey::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());




    }

    public function testDelete(): void
    {
        $this->api->emailKeys->delete('acme', 'acme', 1, []);

        // @phpstan-ignore staticMethod.alreadyNarrowedType
        self::assertTrue(true, 'Reached end of test');
    }

    public function testGet(): void
    {
        $responseEntity = $this->api->emailKeys->get('acme', 'acme', 1, []);

        $expectedResponseJson = $this->loadFixture('EmailKeyGetResponse.json');
        self::assertInstanceOf(EmailKey::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());




    }

    public function testAll(): void
    {
        $responseEntity = $this->api->emailKeys->all('acme', 'acme', []);

        $expectedResponseJson = $this->loadFixture('EmailKeyAllResponse.json');
        self::assertInstanceOf(EmailKeyCollection::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());



        foreach ($responseEntity->getEntities() as $collectionEntity) {
            self::assertInstanceOf(EmailKey::class, $collectionEntity);

        }
    }
}
