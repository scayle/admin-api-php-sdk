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
use Scayle\Cloud\AdminApi\Models\Redirect;
use Scayle\Cloud\AdminApi\Models\RedirectCollection;

class RedirectService extends AbstractService
{
    /**
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function all(
        string $shopKey,
        array $options = []
    ): RedirectCollection {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/shops/%s/redirects', $shopKey),
            query: $options,
            headers: [],
            modelClass: RedirectCollection::class,
            body: null
        );
    }

    /**
     * @param Redirect[] $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function createOrUpdateBulk(
        string $shopKey,
        array $model,
        array $options = []
    ): RedirectCollection {
        return $this->request(
            method: 'put',
            relativeUrl: $this->resolvePath('/shops/%s/redirects/bulk', $shopKey),
            query: $options,
            headers: [],
            modelClass: RedirectCollection::class,
            body: $model
        );
    }

    /**
     * @param Redirect[] $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function deleteBulk(
        string $shopKey,
        array $model,
        array $options = []
    ): void {
        $this->request(
            method: 'delete',
            relativeUrl: $this->resolvePath('/shops/%s/redirects/bulk', $shopKey),
            query: $options,
            headers: [],
            modelClass: null,
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
        int $redirectId,
        array $options = []
    ): void {
        $this->request(
            method: 'delete',
            relativeUrl: $this->resolvePath('/shops/%s/redirects/%s', $shopKey, $redirectId),
            query: $options,
            headers: [],
            modelClass: null,
            body: null
        );
    }

    /**
     * @param Redirect $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function create(
        string $shopKey,
        Redirect $model,
        array $options = []
    ): Redirect {
        return $this->request(
            method: 'post',
            relativeUrl: $this->resolvePath('/shops/%s/redirects', $shopKey),
            query: $options,
            headers: [],
            modelClass: Redirect::class,
            body: $model
        );
    }

    /**
     * @param Redirect $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function update(
        string $shopKey,
        int $redirectId,
        Redirect $model,
        array $options = []
    ): Redirect {
        return $this->request(
            method: 'put',
            relativeUrl: $this->resolvePath('/shops/%s/redirects/%s', $shopKey, $redirectId),
            query: $options,
            headers: [],
            modelClass: Redirect::class,
            body: $model
        );
    }
}
