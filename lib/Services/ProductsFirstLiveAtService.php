<?php

namespace AboutYou\Cloud\AdminApi\Services;

use AboutYou\Cloud\AdminApi\Exceptions\ApiErrorException;
use AboutYou\Cloud\AdminApi\Models\ProductsFirstLiveAt;
use Psr\Http\Client\ClientExceptionInterface;

class ProductsFirstLiveAtService extends AbstractService
{
    /**
     * @param ProductsFirstLiveAt $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function updateProductsFirstLiveAt($model, $options = [])
    {
        $this->request(
            'put',
            $this->resolvePath('/products/first-live-at'),
            $options,
            [],
            null,
            $model
        );
    }
}
