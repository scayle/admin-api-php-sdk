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
	 * @param string $productIdentifier
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
	 * @param string $productIdentifier
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
	 * @param string $productIdentifier
	 * @param string $imageIdentifier
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
	 * @param string $productIdentifier
	 * @param string $imageIdentifier
	 * @param array $options additional options like limit or filters
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
	 */
	 public function delete($productIdentifier, $imageIdentifier, $options = [])
	 {
		 $this->request('delete', $this->resolvePath('/products/%s/images/%s', $productIdentifier, $imageIdentifier), $options, null);
     }

}