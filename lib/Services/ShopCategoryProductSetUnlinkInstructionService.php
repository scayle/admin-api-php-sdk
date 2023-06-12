<?php

namespace AboutYou\Cloud\AdminApi\Services;

use AboutYou\Cloud\AdminApi\Exceptions\ApiErrorException;
use Psr\Http\Client\ClientExceptionInterface;

class ShopCategoryProductSetUnlinkInstructionService extends AbstractService
{
    /**
     * @param string $shopKey
     * @param int $productSetId
     * @param \AboutYou\Cloud\AdminApi\Models\ShopCategoryProductSetUnlinkInstruction $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function unlink($shopKey, $productSetId, $model, $options = [])
    {
        $this->request(
            'put',
            $this->resolvePath('/shops/%s/product-sets/%s/unlink', $shopKey, $productSetId),
            $options,
            [],
            null,
            $model
        );
    }
}
