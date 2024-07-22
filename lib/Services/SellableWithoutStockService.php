<?php

namespace AboutYou\Cloud\AdminApi\Services;

use AboutYou\Cloud\AdminApi\Exceptions\ApiErrorException;
use AboutYou\Cloud\AdminApi\Models\Identifier;
use AboutYou\Cloud\AdminApi\Models\SellableWithoutStock;
use Psr\Http\Client\ClientExceptionInterface;

class SellableWithoutStockService extends AbstractService
{
    /**
     * @param Identifier $variantIdentifier
     * @param SellableWithoutStock $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @return SellableWithoutStock
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function setSellableWithoutStock($variantIdentifier, $model, $options = [])
    {
        return $this->request(
            'put',
            $this->resolvePath('/variants/%s/stocks/sellableWithoutStock', $variantIdentifier),
            $options,
            [],
            SellableWithoutStock::class,
            $model
        );
    }
}
