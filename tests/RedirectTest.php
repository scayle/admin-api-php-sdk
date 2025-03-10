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

use Scayle\Cloud\AdminApi\Models\Redirect;
use Scayle\Cloud\AdminApi\Models\RedirectCollection;
use Scayle\Cloud\AdminApi\Models\RedirectError;

/**
 * @internal
 */
final class RedirectTest extends BaseApiTestCase
{
    public function testAll(): void
    {
        $responseEntity = $this->api->redirects->all('acme', []);

        $expectedResponseJson = $this->loadFixture('RedirectAllResponse.json');
        self::assertInstanceOf(RedirectCollection::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'parent', Redirect::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'error', RedirectError::class);


        foreach ($responseEntity->getEntities() as $collectionEntity) {
            self::assertInstanceOf(Redirect::class, $collectionEntity);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'parent', Redirect::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'error', RedirectError::class);

        }
    }

    public function testCreateOrUpdateBulk(): void
    {
        $expectedRequestJson = $this->loadFixture('RedirectCreateOrUpdateBulkRequest.json');

        $requestEntity = [];
        foreach ($expectedRequestJson as $entity) {
            $requestEntity[] = new Redirect($entity);
        }

        $responseEntity = $this->api->redirects->createOrUpdateBulk('acme', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('RedirectCreateOrUpdateBulkResponse.json');
        self::assertInstanceOf(RedirectCollection::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'parent', Redirect::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'error', RedirectError::class);


        foreach ($responseEntity->getEntities() as $collectionEntity) {
            self::assertInstanceOf(Redirect::class, $collectionEntity);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'parent', Redirect::class);
            $this->assertPropertyHasTheCorrectType($collectionEntity, 'error', RedirectError::class);

        }
    }

    public function testDeleteBulk(): void
    {
        $expectedRequestJson = $this->loadFixture('RedirectDeleteBulkRequest.json');

        $requestEntity = [];
        foreach ($expectedRequestJson as $entity) {
            $requestEntity[] = new Redirect($entity);
        }

        $this->api->redirects->deleteBulk('acme', $requestEntity, []);

        // @phpstan-ignore staticMethod.alreadyNarrowedType
        self::assertTrue(true, 'Reached end of test');
    }

    public function testDelete(): void
    {
        $this->api->redirects->delete('acme', 1, []);

        // @phpstan-ignore staticMethod.alreadyNarrowedType
        self::assertTrue(true, 'Reached end of test');
    }

    public function testCreate(): void
    {
        $expectedRequestJson = $this->loadFixture('RedirectCreateRequest.json');

        $requestEntity = new Redirect($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->redirects->create('acme', $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('RedirectCreateResponse.json');
        self::assertInstanceOf(Redirect::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'parent', Redirect::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'error', RedirectError::class);



    }

    public function testUpdate(): void
    {
        $expectedRequestJson = $this->loadFixture('RedirectUpdateRequest.json');

        $requestEntity = new Redirect($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->redirects->update('acme', 1, $requestEntity, []);

        $expectedResponseJson = $this->loadFixture('RedirectUpdateResponse.json');
        self::assertInstanceOf(Redirect::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        $this->assertPropertyHasTheCorrectType($responseEntity, 'parent', Redirect::class);
        $this->assertPropertyHasTheCorrectType($responseEntity, 'error', RedirectError::class);



    }
}
