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
use Scayle\Cloud\AdminApi\Models\Company;
use Scayle\Cloud\AdminApi\Models\CompanyCollection;

class CompanyService extends AbstractService
{
    /**
     * @param Company $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function create(
        Company $model,
        array $options = []
    ): Company {
        return $this->request(
            method: 'post',
            relativeUrl: $this->resolvePath('/companies'),
            query: $options,
            headers: [],
            modelClass: Company::class,
            body: $model
        );
    }

    /**
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function all(
        array $options = []
    ): CompanyCollection {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/companies'),
            query: $options,
            headers: [],
            modelClass: CompanyCollection::class,
            body: null
        );
    }

    /**
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function get(
        int $companyId,
        array $options = []
    ): Company {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/companies/%s', $companyId),
            query: $options,
            headers: [],
            modelClass: Company::class,
            body: null
        );
    }

    /**
     * @param Company $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function update(
        int $companyId,
        Company $model,
        array $options = []
    ): Company {
        return $this->request(
            method: 'put',
            relativeUrl: $this->resolvePath('/companies/%s', $companyId),
            query: $options,
            headers: [],
            modelClass: Company::class,
            body: $model
        );
    }
}
