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

use Scayle\Cloud\AdminApi\Models\ProductSellableTimeframe;

/**
 * @internal
 */
final class ProductSellableTimeframeTest extends BaseApiTestCase
{
    public function testBatchProcess(): void
    {
        $expectedRequestJson = $this->loadFixture('ProductSellableTimeframeBatchProcessRequest.json');

        $requestEntity = [];
        foreach ($expectedRequestJson as $entity) {
            $requestEntity[] = new ProductSellableTimeframe($entity);
        }

        $this->api->productSellableTimeframes->batchProcess($requestEntity, []);

        // @phpstan-ignore staticMethod.alreadyNarrowedType
        self::assertTrue(true, 'Reached end of test');
    }
}
