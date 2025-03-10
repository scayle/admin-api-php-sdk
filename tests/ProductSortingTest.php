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

use Scayle\Cloud\AdminApi\Models\ProductSorting;

/**
 * @internal
 */
final class ProductSortingTest extends BaseApiTestCase
{
    public function testUpdateOrCreate(): void
    {
        $expectedRequestJson = $this->loadFixture('ProductSortingUpdateOrCreateRequest.json');

        $requestEntity = [];
        foreach ($expectedRequestJson as $entity) {
            $requestEntity[] = new ProductSorting($entity);
        }

        $this->api->productSortings->updateOrCreate($requestEntity, []);

        // @phpstan-ignore staticMethod.alreadyNarrowedType
        self::assertTrue(true, 'Reached end of test');
    }

    public function testDelete(): void
    {
        $expectedRequestJson = $this->loadFixture('ProductSortingDeleteRequest.json');

        $requestEntity = [];
        foreach ($expectedRequestJson as $entity) {
            $requestEntity[] = new ProductSorting($entity);
        }

        $this->api->productSortings->delete($requestEntity, []);

        // @phpstan-ignore staticMethod.alreadyNarrowedType
        self::assertTrue(true, 'Reached end of test');
    }
}
