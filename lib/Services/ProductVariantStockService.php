<?php

namespace AboutYou\Cloud\AdminApi\Services;

use AboutYou\Cloud\AdminApi\Exceptions\ApiErrorException;
use Psr\Http\Client\ClientExceptionInterface;

/**
 */
class ProductVariantStockService extends AbstractService
{
	/**
	 * Description
	 *
	 * @param string $productIdentifier
	 * @param string $variantIdentifier
	 * @param \AboutYou\Cloud\AdminApi\Models\ProductVariantStock $model the model to create or update
	 * @param array $options additional options like limit or filters
	 *
	 * @return \AboutYou\Cloud\AdminApi\Models\ProductVariantStock
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
	 */
	 public function create($productIdentifier, $variantIdentifier, $model, $options = [])
	 {
		 return $this->request('post', $this->resolvePath('/products/%s/variants/%s/stocks', $productIdentifier, $variantIdentifier), $options, \AboutYou\Cloud\AdminApi\Models\ProductVariantStock::class, $model);
     }

	/**
	 * Description
	 *
	 * @param string $productIdentifier
	 * @param string $variantIdentifier
	 * @param array $options additional options like limit or filters
	 *
	 * @return \AboutYou\Cloud\AdminApi\Models\ProductVariantStockCollection
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
	 */
	 public function all($productIdentifier, $variantIdentifier, $options = [])
	 {
		 return $this->request('get', $this->resolvePath('/products/%s/variants/%s/stocks', $productIdentifier, $variantIdentifier), $options, \AboutYou\Cloud\AdminApi\Models\ProductVariantStockCollection::class);
     }

}