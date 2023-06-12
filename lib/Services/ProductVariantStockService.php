<?php

namespace AboutYou\Cloud\AdminApi\Services;

use AboutYou\Cloud\AdminApi\Exceptions\ApiErrorException;
use Psr\Http\Client\ClientExceptionInterface;

class ProductVariantStockService extends AbstractService
{
    /**
     * @param \AboutYou\Cloud\AdminApi\Models\Identifier $variantIdentifier
     * @param \AboutYou\Cloud\AdminApi\Models\ProductVariantStock $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\ProductVariantStock
     */
    public function create($variantIdentifier, $model, $options = [])
    {
        return $this->request(
            'post',
            $this->resolvePath('/variants/%s/stocks', $variantIdentifier),
            $options,
            [],
            \AboutYou\Cloud\AdminApi\Models\ProductVariantStock::class,
            $model
        );
    }

    /**
     * @param \AboutYou\Cloud\AdminApi\Models\Identifier $variantIdentifier
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\ProductVariantStockCollection
     */
    public function all($variantIdentifier, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/variants/%s/stocks', $variantIdentifier),
            $options,
            [],
            \AboutYou\Cloud\AdminApi\Models\ProductVariantStockCollection::class,
            null
        );
    }
}
