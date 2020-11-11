<?php

namespace AboutYou\Cloud\AdminApi\Services;

use AboutYou\Cloud\AdminApi\Exceptions\ApiErrorException;
use Psr\Http\Client\ClientExceptionInterface;

/**
 */
class ProductImageService extends AbstractService
{
	/**
	 * Description
	 *
	 * @param \AboutYou\Cloud\AdminApi\Models\Identifier $productIdentifier
	 * @param \AboutYou\Cloud\AdminApi\Models\ProductImage $model the model to create or update
	 * @param array $options additional options like limit or filters
	 *
	 * @return \AboutYou\Cloud\AdminApi\Models\ProductImage
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
	 */
	 public function create($productIdentifier, $model, $options = [])
	 {
		 return $this->request('post', $this->resolvePath('/products/%s/images', $productIdentifier), $options, \AboutYou\Cloud\AdminApi\Models\ProductImage::class, $model);
     }

	/**
	 * Description
	 *
	 * @param \AboutYou\Cloud\AdminApi\Models\Identifier $productIdentifier
	 * @param array $options additional options like limit or filters
	 *
	 * @return \AboutYou\Cloud\AdminApi\Models\ProductImageCollection
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
	 */
	 public function all($productIdentifier, $options = [])
	 {
		 return $this->request('get', $this->resolvePath('/products/%s/images', $productIdentifier), $options, \AboutYou\Cloud\AdminApi\Models\ProductImageCollection::class);
     }

	/**
	 * Description
	 *
	 * @param \AboutYou\Cloud\AdminApi\Models\Identifier $productIdentifier
	 * @param \AboutYou\Cloud\AdminApi\Models\Identifier $imageIdentifier
	 * @param \AboutYou\Cloud\AdminApi\Models\ProductImagePosition $model the model to create or update
	 * @param array $options additional options like limit or filters
	 *
	 * @return \AboutYou\Cloud\AdminApi\Models\ProductImage
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
	 */
	 public function updatePosition($productIdentifier, $imageIdentifier, $model, $options = [])
	 {
		 return $this->request('patch', $this->resolvePath('/products/%s/images/%s', $productIdentifier, $imageIdentifier), $options, \AboutYou\Cloud\AdminApi\Models\ProductImage::class, $model);
     }

	/**
	 * Description
	 *
	 * @param \AboutYou\Cloud\AdminApi\Models\Identifier $productIdentifier
	 * @param \AboutYou\Cloud\AdminApi\Models\Identifier $imageIdentifier
	 * @param array $options additional options like limit or filters
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
	 */
	 public function delete($productIdentifier, $imageIdentifier, $options = [])
	 {
		 $this->request('delete', $this->resolvePath('/products/%s/images/%s', $productIdentifier, $imageIdentifier), $options, null);
     }

	/**
	 * Description
	 *
	 * @param \AboutYou\Cloud\AdminApi\Models\Identifier $productIdentifier
	 * @param \AboutYou\Cloud\AdminApi\Models\Identifier $imageIdentifier
	 * @param \AboutYou\Cloud\AdminApi\Models\Attribute $model the model to create or update
	 * @param array $options additional options like limit or filters
	 *
	 * @return \AboutYou\Cloud\AdminApi\Models\Attribute
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
	 */
	 public function updateOrCreateAttribute($productIdentifier, $imageIdentifier, $model, $options = [])
	 {
		 return $this->request('post', $this->resolvePath('/products/%s/images/%s/attributes', $productIdentifier, $imageIdentifier), $options, \AboutYou\Cloud\AdminApi\Models\Attribute::class, $model);
     }

	/**
	 * Description
	 *
	 * @param \AboutYou\Cloud\AdminApi\Models\Identifier $productIdentifier
	 * @param \AboutYou\Cloud\AdminApi\Models\Identifier $imageIdentifier
	 * @param string $attributeGroupName
	 * @param array $options additional options like limit or filters
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
	 */
	 public function deleteAttribute($productIdentifier, $imageIdentifier, $attributeGroupName, $options = [])
	 {
		 $this->request('delete', $this->resolvePath('/products/%s/images/%s/attributes/%s', $productIdentifier, $imageIdentifier, $attributeGroupName), $options, null);
     }

	/**
	 * Description
	 *
	 * @param \AboutYou\Cloud\AdminApi\Models\Identifier $productIdentifier
	 * @param \AboutYou\Cloud\AdminApi\Models\Identifier $imageIdentifier
	 * @param string $attributeGroupName
	 * @param array $options additional options like limit or filters
	 *
	 * @return \AboutYou\Cloud\AdminApi\Models\Attribute
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
	 */
	 public function getAttribute($productIdentifier, $imageIdentifier, $attributeGroupName, $options = [])
	 {
		 return $this->request('get', $this->resolvePath('/products/%s/images/%s/attributes/%s', $productIdentifier, $imageIdentifier, $attributeGroupName), $options, \AboutYou\Cloud\AdminApi\Models\Attribute::class);
     }

	/**
	 * Description
	 *
	 * @param \AboutYou\Cloud\AdminApi\Models\Identifier $productIdentifier
	 * @param \AboutYou\Cloud\AdminApi\Models\Identifier $imageIdentifier
	 * @param array $options additional options like limit or filters
	 *
	 * @return \AboutYou\Cloud\AdminApi\Models\AttributeCollection
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
	 */
	 public function allAttributes($productIdentifier, $imageIdentifier, $options = [])
	 {
		 return $this->request('get', $this->resolvePath('/products/%s/images/%s/attributes', $productIdentifier, $imageIdentifier), $options, \AboutYou\Cloud\AdminApi\Models\AttributeCollection::class);
     }

}