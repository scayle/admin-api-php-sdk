<?php

namespace AboutYou\Cloud\AdminApi\Services;

use AboutYou\Cloud\AdminApi\Exceptions\ApiErrorException;
use Psr\Http\Client\ClientExceptionInterface;

/**
 */
class ProductVariantPriceService extends AbstractService
{
	/**
	 * Description
	 *
	 * @param string $productIdentifier
	 * @param string $variantIdentifier
	 * @param \AboutYou\Cloud\AdminApi\Models\ProductVariantPrice $model the model to create or update
	 * @param array $options additional options like limit or filters
	 *
	 * @return \AboutYou\Cloud\AdminApi\Models\ProductVariantPrice
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
	 */
	 public function create($productIdentifier, $variantIdentifier, $model, $options = [])
	 {
		 return $this->request('post', $this->resolvePath('/products/%s/variants/%s/prices', $productIdentifier, $variantIdentifier), $options, \AboutYou\Cloud\AdminApi\Models\ProductVariantPrice::class, $model);
     }

	/**
	 * Description
	 *
	 * @param string $productIdentifier
	 * @param string $variantIdentifier
	 * @param array $options additional options like limit or filters
	 *
	 * @return \AboutYou\Cloud\AdminApi\Models\ProductVariantPriceCollection
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
	 */
	 public function all($productIdentifier, $variantIdentifier, $options = [])
	 {
		 return $this->request('get', $this->resolvePath('/products/%s/variants/%s/prices', $productIdentifier, $variantIdentifier), $options, \AboutYou\Cloud\AdminApi\Models\ProductVariantPriceCollection::class);
     }

}