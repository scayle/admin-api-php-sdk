<?php

namespace AboutYou\Cloud\AdminApi;

use AboutYou\Cloud\AdminApi\Models\Redirect;
use AboutYou\Cloud\AdminApi\Models\RedirectCollection;

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

        foreach ($responseEntity->getEntities() as $collectionEntity) {
            self::assertInstanceOf(Redirect::class, $collectionEntity);
        }
    }
}
