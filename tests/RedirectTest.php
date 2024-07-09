<?php

namespace AboutYou\Cloud\AdminApi;

use AboutYou\Cloud\AdminApi\Models\Redirect;
use AboutYou\Cloud\AdminApi\Models\RedirectCollection;
use AboutYou\Cloud\AdminApi\Models\RedirectError;

/**
 * @internal
 */
final class RedirectTest extends BaseApiTestCase
{
    public function testAll()
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

    public function testCreateOrUpdateBulk()
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

    public function testDeleteBulk()
    {
        $expectedRequestJson = $this->loadFixture('RedirectDeleteBulkRequest.json');

        $requestEntity = [];
        foreach ($expectedRequestJson as $entity) {
            $requestEntity[] = new Redirect($entity);
        }

        $responseEntity = $this->api->redirects->deleteBulk('acme', $requestEntity, []);
    }

    public function testDelete()
    {
        $responseEntity = $this->api->redirects->delete('acme', 1, []);
    }

    public function testCreate()
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

    public function testUpdate()
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
