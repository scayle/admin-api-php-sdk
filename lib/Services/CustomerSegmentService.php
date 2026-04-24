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
use Scayle\Cloud\AdminApi\Models\CustomerSegment;
use Scayle\Cloud\AdminApi\Models\CustomerSegmentCollection;

class CustomerSegmentService extends AbstractService
{
    /**
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function getCustomerSegments(
        string $shopKey,
        string $countryCode,
        array $options = []
    ): CustomerSegmentCollection {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/shops/%s/countries/%s/customer-segments', $shopKey, $countryCode),
            query: $options,
            headers: [],
            modelClass: CustomerSegmentCollection::class,
            body: null
        );
    }

    /**
     * @param CustomerSegment $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function createCustomerSegment(
        string $shopKey,
        string $countryCode,
        CustomerSegment $model,
        array $options = []
    ): CustomerSegment {
        return $this->request(
            method: 'post',
            relativeUrl: $this->resolvePath('/shops/%s/countries/%s/customer-segments', $shopKey, $countryCode),
            query: $options,
            headers: [],
            modelClass: CustomerSegment::class,
            body: $model
        );
    }

    /**
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function getCustomerSegment(
        string $shopKey,
        string $countryCode,
        string $segmentGuid,
        array $options = []
    ): CustomerSegment {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/shops/%s/countries/%s/customer-segments/%s', $shopKey, $countryCode, $segmentGuid),
            query: $options,
            headers: [],
            modelClass: CustomerSegment::class,
            body: null
        );
    }

    /**
     * @param CustomerSegment $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function updateCustomerSegment(
        string $shopKey,
        string $countryCode,
        string $segmentGuid,
        CustomerSegment $model,
        array $options = []
    ): CustomerSegment {
        return $this->request(
            method: 'patch',
            relativeUrl: $this->resolvePath('/shops/%s/countries/%s/customer-segments/%s', $shopKey, $countryCode, $segmentGuid),
            query: $options,
            headers: [],
            modelClass: CustomerSegment::class,
            body: $model
        );
    }

    /**
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function deleteCustomerSegment(
        string $shopKey,
        string $countryCode,
        string $segmentGuid,
        array $options = []
    ): void {
        $this->request(
            method: 'delete',
            relativeUrl: $this->resolvePath('/shops/%s/countries/%s/customer-segments/%s', $shopKey, $countryCode, $segmentGuid),
            query: $options,
            headers: [],
            modelClass: null,
            body: null
        );
    }
}
