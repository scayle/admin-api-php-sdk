<?php

namespace AboutYou\Cloud\AdminApi\Services;

use AboutYou\Cloud\AdminApi\Exceptions\ApiErrorException;
use AboutYou\Cloud\AdminApi\Models\PromotionV1;
use Psr\Http\Client\ClientExceptionInterface;

class PromotionV1Service extends AbstractService
{
    /**
     * @param PromotionV1 $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @return PromotionV1
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function create($model, $options = [])
    {
        return $this->request(
            'post',
            $this->resolvePath('/create-promotion'),
            $options,
            [],
            PromotionV1::class,
            $model
        );
    }

    /**
     * @param string $promotionId
     * @param PromotionV1 $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @return PromotionV1
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function update($promotionId, $model, $options = [])
    {
        return $this->request(
            'put',
            $this->resolvePath('/update-promotion/%s', $promotionId),
            $options,
            [],
            PromotionV1::class,
            $model
        );
    }
}
