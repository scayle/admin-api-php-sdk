<?php

namespace AboutYou\Cloud\AdminApi\Services;

use AboutYou\Cloud\AdminApi\Exceptions\ApiErrorException;
use Psr\Http\Client\ClientExceptionInterface;

class CampaignService extends AbstractService
{
    /**
     * Description.
     *
     * @param \AboutYou\Cloud\AdminApi\Models\Campaign $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\Campaign
     */
    public function create($model, $options = [])
    {
        return $this->request('post', '/campaigns', $options, \AboutYou\Cloud\AdminApi\Models\Campaign::class, $model);
    }

    /**
     * Description.
     *
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\CampaignCollection
     */
    public function all($options = [])
    {
        return $this->request('get', '/campaigns', $options, \AboutYou\Cloud\AdminApi\Models\CampaignCollection::class);
    }

    /**
     * Description.
     *
     * @param int $campaignId
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\Campaign
     */
    public function get($campaignId, $options = [])
    {
        return $this->request('get', $this->resolvePath('/campaigns/%s', $campaignId), $options, \AboutYou\Cloud\AdminApi\Models\Campaign::class);
    }

    /**
     * Description.
     *
     * @param int $campaignId
     * @param \AboutYou\Cloud\AdminApi\Models\Campaign $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\Campaign
     */
    public function update($campaignId, $model, $options = [])
    {
        return $this->request('put', $this->resolvePath('/campaigns/%s', $campaignId), $options, \AboutYou\Cloud\AdminApi\Models\Campaign::class, $model);
    }

    /**
     * Description.
     *
     * @param int $campaignId
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function delete($campaignId, $options = [])
    {
        $this->request('delete', $this->resolvePath('/campaigns/%s', $campaignId), $options, null);
    }

    /**
     * Description.
     *
     * @param int $campaignId
     * @param \AboutYou\Cloud\AdminApi\Models\ProductVariantCampaignReduction[] $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function updateOrCreateVariantReductions($campaignId, $model, $options = [])
    {
        $this->request('post', $this->resolvePath('/campaigns/%s/reductions/variants', $campaignId), $options, null, $model);
    }

    /**
     * Description.
     *
     * @param int $campaignId
     * @param \AboutYou\Cloud\AdminApi\Models\ProductCampaignReduction[] $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function updateOrCreateProductReductions($campaignId, $model, $options = [])
    {
        $this->request('post', $this->resolvePath('/campaigns/%s/reductions/products', $campaignId), $options, null, $model);
    }

    /**
     * Description.
     *
     * @param int $campaignId
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\ProductVariantCampaignReductionCollection
     */
    public function allReductions($campaignId, $options = [])
    {
        return $this->request('get', $this->resolvePath('/campaigns/%s/reductions/variants', $campaignId), $options, \AboutYou\Cloud\AdminApi\Models\ProductVariantCampaignReductionCollection::class);
    }

    /**
     * Description.
     *
     * @param int $campaignId
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function deleteReductions($campaignId, $options = [])
    {
        $this->request('delete', $this->resolvePath('/campaigns/%s/reductions', $campaignId), $options, null);
    }
}
