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

namespace Scayle\Cloud\AdminApi\Services;

use Psr\Http\Client\ClientExceptionInterface;
use Scayle\Cloud\AdminApi\Exceptions\ApiErrorException;
use Scayle\Cloud\AdminApi\Models\ShopCategoryProductSetUnlinkInstruction;

class ShopCategoryProductSetUnlinkInstructionService extends AbstractService
{
    /**
     * @param ShopCategoryProductSetUnlinkInstruction $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function unlink(
        string $shopKey,
        int $productSetId,
        ShopCategoryProductSetUnlinkInstruction $model,
        array $options = []
    ): void {
        $this->request(
            method: 'put',
            relativeUrl: $this->resolvePath('/shops/%s/product-sets/%s/unlink', $shopKey, $productSetId),
            query: $options,
            headers: [],
            modelClass: null,
            body: $model
        );
    }
}
