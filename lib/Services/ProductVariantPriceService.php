<?php

namespace AboutYou\Cloud\AdminApi\Services;

use AboutYou\Cloud\AdminApi\Exceptions\ApiErrorException;
use AboutYou\Cloud\AdminApi\Models\Identifier;
use AboutYou\Cloud\AdminApi\Models\ProductVariantPrice;
use AboutYou\Cloud\AdminApi\Models\ProductVariantPriceCollection;
use Psr\Http\Client\ClientExceptionInterface;

class ProductVariantPriceService extends AbstractService
{
    /**
     * @param Identifier $variantIdentifier
     * @param ProductVariantPrice $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @return ProductVariantPrice
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function create($variantIdentifier, $model, $options = [])
    {
        return $this->request(
            'post',
            $this->resolvePath('/variants/%s/prices', $variantIdentifier),
            $options,
            [],
            ProductVariantPrice::class,
            $model
        );
    }

    /**
     * @param Identifier $variantIdentifier
     * @param array $options additional options like limit or filters
     *
     * @return ProductVariantPriceCollection
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function all($variantIdentifier, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/variants/%s/prices', $variantIdentifier),
            $options,
            [],
            ProductVariantPriceCollection::class,
            null
        );
    }

    /**
     * @param Identifier $variantIdentifier
     * @param string $priceKey
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function delete($variantIdentifier, $priceKey, $options = [])
    {
        $this->request(
            'delete',
            $this->resolvePath('/variants/%s/prices/%s', $variantIdentifier, $priceKey),
            $options,
            [],
            null,
            null
        );
    }
}
