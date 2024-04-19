<?php

namespace AboutYou\Cloud\AdminApi\Services;

use AboutYou\Cloud\AdminApi\Exceptions\ApiErrorException;
use AboutYou\Cloud\AdminApi\Models\ShopCountryPriceRounding;
use AboutYou\Cloud\AdminApi\Models\ShopCountryPriceRoundingCollection;
use Psr\Http\Client\ClientExceptionInterface;

class ShopCountryPriceRoundingService extends AbstractService
{
    /**
     * @param string $shopKey
     * @param string $countryCode
     * @param array $options additional options like limit or filters
     *
     * @return ShopCountryPriceRoundingCollection
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function all($shopKey, $countryCode, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/shops/%s/countries/%s/price-roundings', $shopKey, $countryCode),
            $options,
            [],
            ShopCountryPriceRoundingCollection::class,
            null
        );
    }

    /**
     * @param string $shopKey
     * @param string $countryCode
     * @param ShopCountryPriceRounding $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @return ShopCountryPriceRounding
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function create($shopKey, $countryCode, $model, $options = [])
    {
        return $this->request(
            'post',
            $this->resolvePath('/shops/%s/countries/%s/price-roundings', $shopKey, $countryCode),
            $options,
            [],
            ShopCountryPriceRounding::class,
            $model
        );
    }

    /**
     * @param string $shopKey
     * @param string $countryCode
     * @param int $priceRoundingId
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function delete($shopKey, $countryCode, $priceRoundingId, $options = [])
    {
        $this->request(
            'delete',
            $this->resolvePath('/shops/%s/countries/%s/price-roundings/%s', $shopKey, $countryCode, $priceRoundingId),
            $options,
            [],
            null,
            null
        );
    }
}
