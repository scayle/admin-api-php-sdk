<?php

namespace AboutYou\Cloud\AdminApi\Services;

use AboutYou\Cloud\AdminApi\Exceptions\ApiErrorException;
use Psr\Http\Client\ClientExceptionInterface;

class CampaignService extends AbstractService
{
    /**
     * @param string $shopKey
     * @param \AboutYou\Cloud\AdminApi\Models\Campaign $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\Campaign
     */
    public function create($shopKey, $model, $options = [])
    {
        return $this->request(
            'post',
            $this->resolvePath('/shops/%s/campaigns', $shopKey),
            $options,
            [],
            \AboutYou\Cloud\AdminApi\Models\Campaign::class,
            $model
        );
    }

    /**
     * @param string $shopKey
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\CampaignCollection
     */
    public function all($shopKey, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/shops/%s/campaigns', $shopKey),
            $options,
            [],
            \AboutYou\Cloud\AdminApi\Models\CampaignCollection::class,
            null
        );
    }

    /**
     * @param string $shopKey
     * @param int $campaignId
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\Campaign
     */
    public function get($shopKey, $campaignId, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/shops/%s/campaigns/%s', $shopKey, $campaignId),
            $options,
            [],
            \AboutYou\Cloud\AdminApi\Models\Campaign::class,
            null
        );
    }

    /**
     * @param string $shopKey
     * @param int $campaignId
     * @param \AboutYou\Cloud\AdminApi\Models\Campaign $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\Campaign
     */
    public function update($shopKey, $campaignId, $model, $options = [])
    {
        return $this->request(
            'put',
            $this->resolvePath('/shops/%s/campaigns/%s', $shopKey, $campaignId),
            $options,
            [],
            \AboutYou\Cloud\AdminApi\Models\Campaign::class,
            $model
        );
    }

    /**
     * @param string $shopKey
     * @param int $campaignId
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function delete($shopKey, $campaignId, $options = [])
    {
        $this->request(
            'delete',
            $this->resolvePath('/shops/%s/campaigns/%s', $shopKey, $campaignId),
            $options,
            [],
            null,
            null
        );
    }

    /**
     * @param string $shopKey
     * @param int $campaignId
     * @param \AboutYou\Cloud\AdminApi\Models\ProductVariantCampaignReduction[] $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function updateOrCreateVariantReductions($shopKey, $campaignId, $model, $options = [])
    {
        $this->request(
            'post',
            $this->resolvePath('/shops/%s/campaigns/%s/reductions/variants', $shopKey, $campaignId),
            $options,
            [],
            null,
            $model
        );
    }

    /**
     * @param string $shopKey
     * @param int $campaignId
     * @param \AboutYou\Cloud\AdminApi\Models\ProductCampaignReduction[] $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function updateOrCreateProductReductions($shopKey, $campaignId, $model, $options = [])
    {
        $this->request(
            'post',
            $this->resolvePath('/shops/%s/campaigns/%s/reductions/products', $shopKey, $campaignId),
            $options,
            [],
            null,
            $model
        );
    }

    /**
     * @param string $shopKey
     * @param int $campaignId
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\ProductVariantCampaignReductionCollection
     */
    public function allReductions($shopKey, $campaignId, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/shops/%s/campaigns/%s/reductions/variants', $shopKey, $campaignId),
            $options,
            [],
            \AboutYou\Cloud\AdminApi\Models\ProductVariantCampaignReductionCollection::class,
            null
        );
    }

    /**
     * @param string $shopKey
     * @param int $campaignId
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function deleteReductions($shopKey, $campaignId, $options = [])
    {
        $this->request(
            'delete',
            $this->resolvePath('/shops/%s/campaigns/%s/reductions', $shopKey, $campaignId),
            $options,
            [],
            null,
            null
        );
    }

    /**
     * @param \AboutYou\Cloud\AdminApi\Models\Identifier $campaignId
     * @param array $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return array
     */
    public function createOrUpdateCustomData($campaignId, $model, $options = [])
    {
        return $this->request(
            'put',
            $this->resolvePath('/campaigns/%s/custom-data', $campaignId),
            $options,
            [],
            null,
            $model
        );
    }

    /**
     * @param \AboutYou\Cloud\AdminApi\Models\Identifier $campaignId
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function deleteCustomData($campaignId, $options = [])
    {
        $this->request(
            'delete',
            $this->resolvePath('/campaigns/%s/custom-data', $campaignId),
            $options,
            [],
            null,
            null
        );
    }

    /**
     * @param \AboutYou\Cloud\AdminApi\Models\Identifier $campaignId
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return array
     */
    public function getCustomData($campaignId, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/campaigns/%s/custom-data', $campaignId),
            $options,
            [],
            null,
            null
        );
    }

    /**
     * @param \AboutYou\Cloud\AdminApi\Models\Identifier $campaignId
     * @param string $key
     * @param array $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return array
     */
    public function createOrUpdateCustomDataForKey($campaignId, $key, $model, $options = [])
    {
        return $this->request(
            'put',
            $this->resolvePath('/campaigns/%s/custom-data/%s', $campaignId, $key),
            $options,
            [],
            null,
            $model
        );
    }

    /**
     * @param \AboutYou\Cloud\AdminApi\Models\Identifier $campaignId
     * @param string $key
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function deleteCustomDataForKey($campaignId, $key, $options = [])
    {
        $this->request(
            'delete',
            $this->resolvePath('/campaigns/%s/custom-data/%s', $campaignId, $key),
            $options,
            [],
            null,
            null
        );
    }

    /**
     * @param \AboutYou\Cloud\AdminApi\Models\Identifier $campaignId
     * @param string $key
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return array
     */
    public function getCustomDataForKey($campaignId, $key, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/campaigns/%s/custom-data/%s', $campaignId, $key),
            $options,
            [],
            null,
            null
        );
    }
}
