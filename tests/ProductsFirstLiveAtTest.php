<?php

namespace AboutYou\Cloud\AdminApi;

use AboutYou\Cloud\AdminApi\Models\ProductsFirstLiveAt;

/**
 * @internal
 */
final class ProductsFirstLiveAtTest extends BaseApiTestCase
{
    public function testUpdateProductsFirstLiveAt()
    {
        $expectedRequestJson = $this->loadFixture('ProductsFirstLiveAtUpdateProductsFirstLiveAtRequest.json');

        $requestEntity = new ProductsFirstLiveAt($expectedRequestJson);
        self::assertJsonStringEqualsJsonString(json_encode($expectedRequestJson), $requestEntity->toJson());

        $responseEntity = $this->api->productsFirstLiveAts->updateProductsFirstLiveAt($requestEntity, []);
    }
}
