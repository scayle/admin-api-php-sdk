<?php

namespace AboutYou\Cloud\AdminApi\Services;

use AboutYou\Cloud\AdminApi\Exceptions\ApiErrorException;
use Psr\Http\Client\ClientExceptionInterface;

/**
 */
class ProductVariantService extends AbstractService
{
	/**
	 * Description
	 *
	 * @param string $productIdentifier
	 * @param \AboutYou\Cloud\AdminApi\Models\ProductVariant $model the model to create or update
	 * @param array $options additional options like limit or filters
	 *
	 * @return \AboutYou\Cloud\AdminApi\Models\ProductVariant
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
	 */
	 public function create($productIdentifier, $model, $options = [])
	 {
		 return $this->request('post', $this->resolvePath('/products/%s/variants', $productIdentifier), $options, \AboutYou\Cloud\AdminApi\Models\ProductVariant::class, $model);
     }

	/**
	 * Description
	 *
	 * @param string $productIdentifier
	 * @param string $variantIdentifier
	 * @param array $options additional options like limit or filters
	 *
	 * @return \AboutYou\Cloud\AdminApi\Models\ProductVariant
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
	 */
	 public function find($productIdentifier, $variantIdentifier, $options = [])
	 {
		 return $this->request('get', $this->resolvePath('/products/%s/variants/%s', $productIdentifier, $variantIdentifier), $options, \AboutYou\Cloud\AdminApi\Models\ProductVariant::class);
     }

	/**
	 * Description
	 *
	 * @param string $productIdentifier
	 * @param array $options additional options like limit or filters
	 *
	 * @return \AboutYou\Cloud\AdminApi\Models\ProductVariantCollection
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
	 */
	 public function all($productIdentifier, $options = [])
	 {
		 return $this->request('get', $this->resolvePath('/products/%s/variants', $productIdentifier), $options, \AboutYou\Cloud\AdminApi\Models\ProductVariantCollection::class);
     }

	/**
	 * Description
	 *
	 * @param string $productIdentifier
	 * @param string $variantIdentifier
	 * @param \AboutYou\Cloud\AdminApi\Models\ProductVariant $model the model to create or update
	 * @param array $options additional options like limit or filters
	 *
	 * @return \AboutYou\Cloud\AdminApi\Models\ProductVariant
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
	 */
	 public function replace($productIdentifier, $variantIdentifier, $model, $options = [])
	 {
		 return $this->request('put', $this->resolvePath('/products/%s/variants/%s', $productIdentifier, $variantIdentifier), $options, \AboutYou\Cloud\AdminApi\Models\ProductVariant::class, $model);
     }

	/**
	 * Description
	 *
	 * @param string $productIdentifier
	 * @param string $variantIdentifier
	 * @param array $options additional options like limit or filters
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
	 */
	 public function delete($productIdentifier, $variantIdentifier, $options = [])
	 {
		 $this->request('delete', $this->resolvePath('/products/%s/variants/%s', $productIdentifier, $variantIdentifier), $options, null);
     }

}