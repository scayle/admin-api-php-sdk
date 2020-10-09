<?php

namespace AboutYou\Cloud\AdminApi\Services;

use AboutYou\Cloud\AdminApi\Exceptions\ApiErrorException;
use Psr\Http\Client\ClientExceptionInterface;

/**
 */
class ShopService extends AbstractService
{
	/**
	 * Description
	 *
	 * @param \AboutYou\Cloud\AdminApi\Models\Shop $model the model to create or update
	 * @param array $options additional options like limit or filters
	 *
	 * @return \AboutYou\Cloud\AdminApi\Models\Shop
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
	 */
	 public function create($model, $options = [])
	 {
		 return $this->request('post', '/shops', $options, \AboutYou\Cloud\AdminApi\Models\Shop::class, $model);
     }

	/**
	 * Description
	 *
	 * @param array $options additional options like limit or filters
	 *
	 * @return \AboutYou\Cloud\AdminApi\Models\ShopCollection
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
	 */
	 public function all($options = [])
	 {
		 return $this->request('get', '/shops', $options, \AboutYou\Cloud\AdminApi\Models\ShopCollection::class);
     }

}