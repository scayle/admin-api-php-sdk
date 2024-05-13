<?php

namespace AboutYou\Cloud\AdminApi\Services;

use AboutYou\Cloud\AdminApi\Exceptions\ApiErrorException;
use AboutYou\Cloud\AdminApi\Models\Promotion;
use AboutYou\Cloud\AdminApi\Models\PromotionCollection;
use Psr\Http\Client\ClientExceptionInterface;

class PromotionService extends AbstractService
{
    /**
     * @param array $options additional options like limit or filters
     *
     * @return PromotionCollection
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function all($options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/promotions'),
            $options,
            [],
            PromotionCollection::class,
            null
        );
    }

    /**
     * @param Promotion $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @return Promotion
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function create($model, $options = [])
    {
        return $this->request(
            'post',
            $this->resolvePath('/promotions'),
            $options,
            [],
            Promotion::class,
            $model
        );
    }

    /**
     * @param string $promotionId
     * @param array $options additional options like limit or filters
     *
     * @return Promotion
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function get($promotionId, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/promotions/%s', $promotionId),
            $options,
            [],
            Promotion::class,
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
            $this->resolvePath('/promotions/%s', $promotionId),
            $options,
            [],
            null,
            null
        );
    }

    /**
     * @param string $promotionId
     * @param Promotion $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @return Promotion
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function update($promotionId, $model, $options = [])
    {
        return $this->request(
            'put',
            $this->resolvePath('/promotions/%s', $promotionId),
            $options,
            [],
            Promotion::class,
            $model
        );
    }
}
