<?php

namespace AboutYou\Cloud\AdminApi\Services;

use AboutYou\Cloud\AdminApi\Exceptions\ApiErrorException;
use Psr\Http\Client\ClientExceptionInterface;

/**
 */
class CampaignService extends AbstractService
{
	/**
	 * Description
	 *
	 * @param \AboutYou\Cloud\AdminApi\Models\Campaign $model the model to create or update
	 * @param array $options additional options like limit or filters
	 *
	 * @return \AboutYou\Cloud\AdminApi\Models\Campaign
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
	 */
	 public function create($model, $options = [])
	 {
		 return $this->request('post', '/campaigns', $options, \AboutYou\Cloud\AdminApi\Models\Campaign::class, $model);
     }

}