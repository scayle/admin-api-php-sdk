<?php

namespace AboutYou\Cloud\AdminApi;

/**
 * @internal
 */
final class PackageGroupTest extends BaseApiTestCase
{
    public function testAll()
    {
        $responseEntity = $this->api->packageGroups->all('acme', 'acme', []);

        $expectedResponseJson = $this->loadFixture('PackageGroupAllResponse.json');
        static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\PackageGroupCollection::class, $responseEntity);
        static::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());

        foreach ($responseEntity->getEntities() as $collectionEntity) {
            static::assertInstanceOf(\AboutYou\Cloud\AdminApi\Models\PackageGroup::class, $collectionEntity);
        }
    }

    public function testAssignPackageGroupToWarehouses()
    {
        $expectedRequestJson = $this->loadFixture('PackageGroupAssignPackageGroupToWarehousesRequest.json');

        $requestEntity = [];
        foreach ($expectedRequestJson as $entity) {
            $requestEntity[] = new \AboutYou\Cloud\AdminApi\Models\PackageGroupWarehouse($entity);
        }

        $responseEntity = $this->api->packageGroups->assignPackageGroupToWarehouses('acme', 'acme', 1, $requestEntity, []);
    }

    public function testReplacePackageGroupForWarehouses()
    {
        $expectedRequestJson = $this->loadFixture('PackageGroupReplacePackageGroupForWarehousesRequest.json');

        $requestEntity = [];
        foreach ($expectedRequestJson as $entity) {
            $requestEntity[] = new \AboutYou\Cloud\AdminApi\Models\PackageGroupWarehouse($entity);
        }

        $responseEntity = $this->api->packageGroups->replacePackageGroupForWarehouses('acme', 'acme', 1, $requestEntity, []);
    }

    public function testDelete()
    {
        $responseEntity = $this->api->packageGroups->delete('acme', 'acme', 1, []);
    }
}
