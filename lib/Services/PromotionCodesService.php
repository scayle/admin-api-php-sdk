<?php

namespace AboutYou\Cloud\AdminApi\Services;

use AboutYou\Cloud\AdminApi\Exceptions\ApiErrorException;
use AboutYou\Cloud\AdminApi\Models\PromotionCodeCollection;
use AboutYou\Cloud\AdminApi\Models\PromotionCodes;
use Psr\Http\Client\ClientExceptionInterface;

class PromotionCodesService extends AbstractService
{
    /**
     * @param string $promotionId
     * @param PromotionCodes $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @return PromotionCodes
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function create($promotionId, $model, $options = [])
    {
        return $this->request(
            'post',
            $this->resolvePath('/promotions/%s/codes', $promotionId),
            $options,
            [],
            PromotionCodes::class,
            $model
        );
    }

    /**
     * @param string $promotionId
     * @param array $options additional options like limit or filters
     *
     * @return PromotionCodeCollection
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function all($promotionId, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/promotions/%s/codes', $promotionId),
            $options,
            [],
            PromotionCodeCollection::class,
            null
        );
    }

    /**
     * @param string $promotionId
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function delete($promotionId, $options = [])
    {
        $this->request(
            'delete',
            $this->resolvePath('/promotions/%s/codes', $promotionId),
            $options,
            [],
            null,
            null
        );
    }
}
