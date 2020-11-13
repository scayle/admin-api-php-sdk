<?php

namespace AboutYou\Cloud\AdminApi\Services;

use AboutYou\Cloud\AdminApi\Exceptions\ApiErrorException;
use Psr\Http\Client\ClientExceptionInterface;

class ProductVariantPriceService extends AbstractService
{
    /**
     * Description.
     *
     * @param \AboutYou\Cloud\AdminApi\Models\Identifier $productIdentifier
     * @param \AboutYou\Cloud\AdminApi\Models\Identifier $variantIdentifier
     * @param \AboutYou\Cloud\AdminApi\Models\ProductVariantPrice $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\ProductVariantPrice
     */
    public function create($productIdentifier, $variantIdentifier, $model, $options = [])
    {
        return $this->request('post', $this->resolvePath('/products/%s/variants/%s/prices', $productIdentifier, $variantIdentifier), $options, \AboutYou\Cloud\AdminApi\Models\ProductVariantPrice::class, $model);
    }

    /**
     * Description.
     *
     * @param \AboutYou\Cloud\AdminApi\Models\Identifier $productIdentifier
     * @param \AboutYou\Cloud\AdminApi\Models\Identifier $variantIdentifier
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\ProductVariantPriceCollection
     */
    public function all($productIdentifier, $variantIdentifier, $options = [])
    {
        return $this->request('get', $this->resolvePath('/products/%s/variants/%s/prices', $productIdentifier, $variantIdentifier), $options, \AboutYou\Cloud\AdminApi\Models\ProductVariantPriceCollection::class);
    }

    /**
     * Description.
     *
     * @param \AboutYou\Cloud\AdminApi\Models\Identifier $productIdentifier
     * @param \AboutYou\Cloud\AdminApi\Models\Identifier $variantIdentifier
     * @param int $priceId
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function deleteFuturePrice($productIdentifier, $variantIdentifier, $priceId, $options = [])
    {
        $this->request('delete', $this->resolvePath('/products/%s/variants/%s/prices/%s', $productIdentifier, $variantIdentifier, $priceId), $options, null);
    }
}
