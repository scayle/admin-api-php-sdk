<?php

namespace AboutYou\Cloud\AdminApi;

use AboutYou\Cloud\AdminApi\Models\ProductSorting;

/**
 * @internal
 */
final class ProductSortingTest extends BaseApiTestCase
{
    public function testUpdateOrCreate()
    {
        $expectedRequestJson = $this->loadFixture('ProductSortingUpdateOrCreateRequest.json');

        $requestEntity = [];
        foreach ($expectedRequestJson as $entity) {
            $requestEntity[] = new ProductSorting($entity);
        }

        $responseEntity = $this->api->productSortings->updateOrCreate($requestEntity, []);
    }

    public function testDelete()
    {
        $expectedRequestJson = $this->loadFixture('ProductSortingDeleteRequest.json');

        $requestEntity = [];
        foreach ($expectedRequestJson as $entity) {
            $requestEntity[] = new ProductSorting($entity);
        }

        $responseEntity = $this->api->productSortings->delete($requestEntity, []);
    }
}
