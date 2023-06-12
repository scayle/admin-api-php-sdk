<?php

namespace AboutYou\Cloud\AdminApi\Services;

use AboutYou\Cloud\AdminApi\Exceptions\ApiErrorException;
use Psr\Http\Client\ClientExceptionInterface;

class ProductVariantPriceService extends AbstractService
{
    /**
     * @param \AboutYou\Cloud\AdminApi\Models\Identifier $variantIdentifier
     * @param \AboutYou\Cloud\AdminApi\Models\ProductVariantPrice $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\ProductVariantPrice
     */
    public function create($variantIdentifier, $model, $options = [])
    {
        return $this->request(
            'post',
            $this->resolvePath('/variants/%s/prices', $variantIdentifier),
            $options,
            [],
            \AboutYou\Cloud\AdminApi\Models\ProductVariantPrice::class,
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
     * @return \AboutYou\Cloud\AdminApi\Models\ProductVariantPriceCollection
     */
    public function all($variantIdentifier, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/variants/%s/prices', $variantIdentifier),
            $options,
            [],
            \AboutYou\Cloud\AdminApi\Models\ProductVariantPriceCollection::class,
            null
        );
    }

    /**
     * @param \AboutYou\Cloud\AdminApi\Models\Identifier $variantIdentifier
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
