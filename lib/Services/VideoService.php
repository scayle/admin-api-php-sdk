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
use Scayle\Cloud\AdminApi\Models\Video;
use Scayle\Cloud\AdminApi\Models\VideoCreateResponse;
use Scayle\Cloud\AdminApi\Models\VideoUploadEntity;

class VideoService extends AbstractService
{
    /**
     * @param Video[] $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function create(
        array $model,
        array $options = []
    ): VideoCreateResponse {
        return $this->request(
            method: 'post',
            relativeUrl: $this->resolvePath('/videos'),
            query: $options,
            headers: [],
            modelClass: VideoCreateResponse::class,
            body: $model
        );
    }

    /**
     * @param Video $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function update(
        string $videoIdentifier,
        Video $model,
        array $options = []
    ): VideoUploadEntity {
        return $this->request(
            method: 'put',
            relativeUrl: $this->resolvePath('/videos/%s', $videoIdentifier),
            query: $options,
            headers: [],
            modelClass: VideoUploadEntity::class,
            body: $model
        );
    }

    /**
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function get(
        string $videoIdentifier,
        array $options = []
    ): Video {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/videos/%s', $videoIdentifier),
            query: $options,
            headers: [],
            modelClass: Video::class,
            body: null
        );
    }

    /**
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function delete(
        string $videoIdentifier,
        array $options = []
    ): void {
        $this->request(
            method: 'delete',
            relativeUrl: $this->resolvePath('/videos/%s', $videoIdentifier),
            query: $options,
            headers: [],
            modelClass: null,
            body: null
        );
    }
}
