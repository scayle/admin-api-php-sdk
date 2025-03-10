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

use Scayle\Cloud\AdminApi\Models\PackageGroup;
use Scayle\Cloud\AdminApi\Models\PackageGroupCollection;
use Scayle\Cloud\AdminApi\Models\PackageGroupWarehouse;

/**
 * @internal
 */
final class PackageGroupTest extends BaseApiTestCase
{
    public function testAll(): void
    {
        $responseEntity = $this->api->packageGroups->all('acme', 'acme', []);

        $expectedResponseJson = $this->loadFixture('PackageGroupAllResponse.json');
        self::assertInstanceOf(PackageGroupCollection::class, $responseEntity);
        self::assertJsonStringEqualsJsonString(json_encode($expectedResponseJson), $responseEntity->toJson());



        foreach ($responseEntity->getEntities() as $collectionEntity) {
            self::assertInstanceOf(PackageGroup::class, $collectionEntity);

        }
    }

    public function testAssignPackageGroupToWarehouses(): void
    {
        $expectedRequestJson = $this->loadFixture('PackageGroupAssignPackageGroupToWarehousesRequest.json');

        $requestEntity = [];
        foreach ($expectedRequestJson as $entity) {
            $requestEntity[] = new PackageGroupWarehouse($entity);
        }

        $this->api->packageGroups->assignPackageGroupToWarehouses('acme', 'acme', 1, $requestEntity, []);

        // @phpstan-ignore staticMethod.alreadyNarrowedType
        self::assertTrue(true, 'Reached end of test');
    }

    public function testReplacePackageGroupForWarehouses(): void
    {
        $expectedRequestJson = $this->loadFixture('PackageGroupReplacePackageGroupForWarehousesRequest.json');

        $requestEntity = [];
        foreach ($expectedRequestJson as $entity) {
            $requestEntity[] = new PackageGroupWarehouse($entity);
        }

        $this->api->packageGroups->replacePackageGroupForWarehouses('acme', 'acme', 1, $requestEntity, []);

        // @phpstan-ignore staticMethod.alreadyNarrowedType
        self::assertTrue(true, 'Reached end of test');
    }

    public function testDelete(): void
    {
        $this->api->packageGroups->delete('acme', 'acme', 1, []);

        // @phpstan-ignore staticMethod.alreadyNarrowedType
        self::assertTrue(true, 'Reached end of test');
    }
}
