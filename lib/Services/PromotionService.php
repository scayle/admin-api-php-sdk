<?php

namespace AboutYou\Cloud\AdminApi\Services;

use AboutYou\Cloud\AdminApi\Exceptions\ApiErrorException;
use Psr\Http\Client\ClientExceptionInterface;

class PromotionService extends AbstractService
{
    /**
     * @param \AboutYou\Cloud\AdminApi\Models\Promotion $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\Promotion
     */
    public function create($model, $options = [])
    {
        return $this->request(
            'post',
            $this->resolvePath('/promotions'),
            $options,
            [],
            \AboutYou\Cloud\AdminApi\Models\Promotion::class,
            $model
        );
    }

    /**
     * @param string $promotionId
     * @param \AboutYou\Cloud\AdminApi\Models\Promotion $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\Promotion
     */
    public function update($promotionId, $model, $options = [])
    {
        return $this->request(
            'put',
            $this->resolvePath('/promotions/%s', $promotionId),
            $options,
            [],
            \AboutYou\Cloud\AdminApi\Models\Promotion::class,
            $model
        );
    }
}
