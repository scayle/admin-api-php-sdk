<?php

namespace AboutYou\Cloud\AdminApi\Services;

use AboutYou\Cloud\AdminApi\Exceptions\ApiErrorException;
use Psr\Http\Client\ClientExceptionInterface;

/**
 */
class ProductService extends AbstractService
{
	/**
	 * Description
	 *
	 * @param \AboutYou\Cloud\AdminApi\Models\Product $model the model to create or update
	 * @param array $options additional options like limit or filters
	 *
	 * @return \AboutYou\Cloud\AdminApi\Models\Product
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
	 */
	 public function create($model, $options = [])
	 {
		 return $this->request('post', '/products', $options, \AboutYou\Cloud\AdminApi\Models\Product::class, $model);
     }

	/**
	 * Description
	 *
	 * @param string $productIdentifier
	 * @param array $options additional options like limit or filters
	 *
	 * @return \AboutYou\Cloud\AdminApi\Models\Product
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
	 */
	 public function find($productIdentifier, $options = [])
	 {
		 return $this->request('get', $this->resolvePath('/products/%s', $productIdentifier), $options, \AboutYou\Cloud\AdminApi\Models\Product::class);
     }

	/**
	 * Description
	 *
	 * @param array $options additional options like limit or filters
	 *
	 * @return \AboutYou\Cloud\AdminApi\Models\ProductCollection
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
	 */
	 public function all($options = [])
	 {
		 return $this->request('get', '/products', $options, \AboutYou\Cloud\AdminApi\Models\ProductCollection::class);
     }

	/**
	 * Description
	 *
	 * @param string $productIdentifier
	 * @param \AboutYou\Cloud\AdminApi\Models\Product $model the model to create or update
	 * @param array $options additional options like limit or filters
	 *
	 * @return \AboutYou\Cloud\AdminApi\Models\Product
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
	 */
	 public function replace($productIdentifier, $model, $options = [])
	 {
		 return $this->request('put', $this->resolvePath('/products/%s', $productIdentifier), $options, \AboutYou\Cloud\AdminApi\Models\Product::class, $model);
     }

	/**
	 * Description
	 *
	 * @param string $productIdentifier
	 * @param array $options additional options like limit or filters
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
	 */
	 public function delete($productIdentifier, $options = [])
	 {
		 $this->request('delete', $this->resolvePath('/products/%s', $productIdentifier), $options, null);
     }

}