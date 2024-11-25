<?php

namespace AboutYou\Cloud\AdminApi\Services;

use AboutYou\Cloud\AdminApi\Exceptions\ApiErrorException;
use AboutYou\Cloud\AdminApi\Models\ProductSorting;
use Psr\Http\Client\ClientExceptionInterface;

class ProductSortingService extends AbstractService
{
    /**
     * @param ProductSorting[] $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function updateOrCreate($model, $options = [])
    {
        $this->request(
            'post',
            $this->resolvePath('/product-sortings'),
            $options,
            [],
            null,
            $model
        );
    }

    /**
     * @param ProductSorting[] $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function delete($model, $options = [])
    {
        $this->request(
            'delete',
            $this->resolvePath('/product-sortings'),
            $options,
            [],
            null,
            $model
        );
    }
}
