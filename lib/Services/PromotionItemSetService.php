<?php

namespace AboutYou\Cloud\AdminApi\Services;

use AboutYou\Cloud\AdminApi\Exceptions\ApiErrorException;
use AboutYou\Cloud\AdminApi\Models\PromotionItemSet;
use AboutYou\Cloud\AdminApi\Models\PromotionItemSetCollection;
use Psr\Http\Client\ClientExceptionInterface;

class PromotionItemSetService extends AbstractService
{
    /**
     * @param PromotionItemSet $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @return PromotionItemSet
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function create($model, $options = [])
    {
        return $this->request(
            'post',
            $this->resolvePath('/promotions/item-sets'),
            $options,
            [],
            PromotionItemSet::class,
            $model
        );
    }

    /**
     * @param string $id
     * @param array $options additional options like limit or filters
     *
     * @return PromotionItemSet
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function get($id, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/promotions/item-sets/%s', $id),
            $options,
            [],
            PromotionItemSet::class,
            null
        );
    }

    /**
     * @param string $promotionItemSetId
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function delete($promotionItemSetId, $options = [])
    {
        $this->request(
            'delete',
            $this->resolvePath('/promotions/item-sets/%s', $promotionItemSetId),
            $options,
            [],
            null,
            null
        );
    }

    /**
     * @param array $options additional options like limit or filters
     *
     * @return PromotionItemSetCollection
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function all($options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/promotions/item-sets'),
            $options,
            [],
            PromotionItemSetCollection::class,
            null
        );
    }
}
