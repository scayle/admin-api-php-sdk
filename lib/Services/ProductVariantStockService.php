<?php

namespace AboutYou\Cloud\AdminApi\Services;

use AboutYou\Cloud\AdminApi\Exceptions\ApiErrorException;
use AboutYou\Cloud\AdminApi\Models\Identifier;
use AboutYou\Cloud\AdminApi\Models\ProductVariantStock;
use AboutYou\Cloud\AdminApi\Models\ProductVariantStockCollection;
use Psr\Http\Client\ClientExceptionInterface;

class ProductVariantStockService extends AbstractService
{
    /**
     * @param Identifier $variantIdentifier
     * @param ProductVariantStock $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @return ProductVariantStock
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function create($variantIdentifier, $model, $options = [])
    {
        return $this->request(
            'post',
            $this->resolvePath('/variants/%s/stocks', $variantIdentifier),
            $options,
            [],
            ProductVariantStock::class,
            $model
        );
    }

    /**
     * @param Identifier $variantIdentifier
     * @param array $options additional options like limit or filters
     *
     * @return ProductVariantStockCollection
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function all($variantIdentifier, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/variants/%s/stocks', $variantIdentifier),
            $options,
            [],
            ProductVariantStockCollection::class,
            null
        );
    }
}
