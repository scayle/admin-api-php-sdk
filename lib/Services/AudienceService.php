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
use Scayle\Cloud\AdminApi\Models\Audience;
use Scayle\Cloud\AdminApi\Models\AudienceCollection;
use Scayle\Cloud\AdminApi\Models\AudienceUpdateRequest;

class AudienceService extends AbstractService
{
    /**
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function getAudiences(
        array $options = []
    ): AudienceCollection {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/promotions/audiences'),
            query: $options,
            headers: [],
            modelClass: AudienceCollection::class,
            body: null
        );
    }

    /**
     * @param Audience $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function createAudience(
        Audience $model,
        array $options = []
    ): Audience {
        return $this->request(
            method: 'post',
            relativeUrl: $this->resolvePath('/promotions/audiences'),
            query: $options,
            headers: [],
            modelClass: Audience::class,
            body: $model
        );
    }

    /**
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function getAudience(
        string $audienceId,
        array $options = []
    ): Audience {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/promotions/audiences/%s', $audienceId),
            query: $options,
            headers: [],
            modelClass: Audience::class,
            body: null
        );
    }

    /**
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function deleteAudience(
        string $audienceId,
        array $options = []
    ): void {
        $this->request(
            method: 'delete',
            relativeUrl: $this->resolvePath('/promotions/audiences/%s', $audienceId),
            query: $options,
            headers: [],
            modelClass: null,
            body: null
        );
    }

    /**
     * @param AudienceUpdateRequest $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function updateAudience(
        string $audienceId,
        AudienceUpdateRequest $model,
        array $options = []
    ): Audience {
        return $this->request(
            method: 'put',
            relativeUrl: $this->resolvePath('/promotions/audiences/%s', $audienceId),
            query: $options,
            headers: [],
            modelClass: Audience::class,
            body: $model
        );
    }
}
