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
	 * @param \AboutYou\Cloud\AdminApi\Models\Identifier $productIdentifier
	 * @param array $options additional options like limit or filters
	 *
	 * @return \AboutYou\Cloud\AdminApi\Models\Product
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
	 */
	 public function get($productIdentifier, $options = [])
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
	 * @param \AboutYou\Cloud\AdminApi\Models\Identifier $productIdentifier
	 * @param \AboutYou\Cloud\AdminApi\Models\Product $model the model to create or update
	 * @param array $options additional options like limit or filters
	 *
	 * @return \AboutYou\Cloud\AdminApi\Models\Product
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
	 */
	 public function update($productIdentifier, $model, $options = [])
	 {
		 return $this->request('put', $this->resolvePath('/products/%s', $productIdentifier), $options, \AboutYou\Cloud\AdminApi\Models\Product::class, $model);
     }

	/**
	 * Description
	 *
	 * @param \AboutYou\Cloud\AdminApi\Models\Identifier $productIdentifier
	 * @param array $options additional options like limit or filters
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
	 */
	 public function delete($productIdentifier, $options = [])
	 {
		 $this->request('delete', $this->resolvePath('/products/%s', $productIdentifier), $options, null);
     }

	/**
	 * Description
	 *
	 * @param \AboutYou\Cloud\AdminApi\Models\Identifier $productIdentifier
	 * @param \AboutYou\Cloud\AdminApi\Models\Attribute $model the model to create or update
	 * @param array $options additional options like limit or filters
	 *
	 * @return \AboutYou\Cloud\AdminApi\Models\Attribute
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
	 */
	 public function updateOrCreateAttribute($productIdentifier, $model, $options = [])
	 {
		 return $this->request('post', $this->resolvePath('/products/%s/attributes', $productIdentifier), $options, \AboutYou\Cloud\AdminApi\Models\Attribute::class, $model);
     }

	/**
	 * Description
	 *
	 * @param \AboutYou\Cloud\AdminApi\Models\Identifier $productIdentifier
	 * @param string $attributeGroupName
	 * @param array $options additional options like limit or filters
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
	 */
	 public function deleteAttribute($productIdentifier, $attributeGroupName, $options = [])
	 {
		 $this->request('delete', $this->resolvePath('/products/%s/attributes/%s', $productIdentifier, $attributeGroupName), $options, null);
     }

	/**
	 * Description
	 *
	 * @param \AboutYou\Cloud\AdminApi\Models\Identifier $productIdentifier
	 * @param string $attributeGroupName
	 * @param array $options additional options like limit or filters
	 *
	 * @return \AboutYou\Cloud\AdminApi\Models\Attribute
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
	 */
	 public function getAttribute($productIdentifier, $attributeGroupName, $options = [])
	 {
		 return $this->request('get', $this->resolvePath('/products/%s/attributes/%s', $productIdentifier, $attributeGroupName), $options, \AboutYou\Cloud\AdminApi\Models\Attribute::class);
     }

	/**
	 * Description
	 *
	 * @param \AboutYou\Cloud\AdminApi\Models\Identifier $productIdentifier
	 * @param array $options additional options like limit or filters
	 *
	 * @return \AboutYou\Cloud\AdminApi\Models\AttributeCollection
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
	 */
	 public function allAttributes($productIdentifier, $options = [])
	 {
		 return $this->request('get', $this->resolvePath('/products/%s/attributes', $productIdentifier), $options, \AboutYou\Cloud\AdminApi\Models\AttributeCollection::class);
     }

}