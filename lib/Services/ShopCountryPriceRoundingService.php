<?php

declare(strict_types=1);

/*
 * This file is part of the AdminAPI PHP SDK provided by SCAYLE GmbH.
 *
 * (c) SCAYLE GmbH <https://www.scayle.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Scayle\Cloud\AdminApi\Services;

use Psr\Http\Client\ClientExceptionInterface;
use Scayle\Cloud\AdminApi\Exceptions\ApiErrorException;
use Scayle\Cloud\AdminApi\Models\ShopCountryPriceRounding;
use Scayle\Cloud\AdminApi\Models\ShopCountryPriceRoundingCollection;

class ShopCountryPriceRoundingService extends AbstractService
{
    /**
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function all(
        string $shopKey,
        string $countryCode,
        array $options = []
    ): ShopCountryPriceRoundingCollection {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/shops/%s/countries/%s/price-roundings', $shopKey, $countryCode),
            query: $options,
            headers: [],
            modelClass: ShopCountryPriceRoundingCollection::class,
            body: null
        );
    }

    /**
     * @param ShopCountryPriceRounding $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function create(
        string $shopKey,
        string $countryCode,
        ShopCountryPriceRounding $model,
        array $options = []
    ): ShopCountryPriceRounding {
        return $this->request(
            method: 'post',
            relativeUrl: $this->resolvePath('/shops/%s/countries/%s/price-roundings', $shopKey, $countryCode),
            query: $options,
            headers: [],
            modelClass: ShopCountryPriceRounding::class,
            body: $model
        );
    }

    /**
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function delete(
        string $shopKey,
        string $countryCode,
        int $priceRoundingId,
        array $options = []
    ): void {
        $this->request(
            method: 'delete',
            relativeUrl: $this->resolvePath('/shops/%s/countries/%s/price-roundings/%s', $shopKey, $countryCode, $priceRoundingId),
            query: $options,
            headers: [],
            modelClass: null,
            body: null
        );
    }
}
