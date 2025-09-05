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
use Scayle\Cloud\AdminApi\Models\Channel;
use Scayle\Cloud\AdminApi\Models\ChannelCollection;
use Scayle\Cloud\AdminApi\Models\ChannelCreateRequest;
use Scayle\Cloud\AdminApi\Models\ChannelUpdateRequest;

class ChannelService extends AbstractService
{
    /**
     * @param ChannelCreateRequest $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function createChannel(
        int $companyId,
        ChannelCreateRequest $model,
        array $options = []
    ): Channel {
        return $this->request(
            method: 'post',
            relativeUrl: $this->resolvePath('/companies/%s/channels', $companyId),
            query: $options,
            headers: [],
            modelClass: Channel::class,
            body: $model
        );
    }

    /**
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function getChannel(
        int $companyId,
        int $channelId,
        array $options = []
    ): Channel {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/companies/%s/channels/%s', $companyId, $channelId),
            query: $options,
            headers: [],
            modelClass: Channel::class,
            body: null
        );
    }

    /**
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function all(
        int $companyId,
        array $options = []
    ): ChannelCollection {
        return $this->request(
            method: 'get',
            relativeUrl: $this->resolvePath('/companies/%s/channels', $companyId),
            query: $options,
            headers: [],
            modelClass: ChannelCollection::class,
            body: null
        );
    }

    /**
     * @param ChannelUpdateRequest $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function updateChannel(
        int $companyId,
        int $channelId,
        ChannelUpdateRequest $model,
        array $options = []
    ): Channel {
        return $this->request(
            method: 'put',
            relativeUrl: $this->resolvePath('/companies/%s/channels/%s', $companyId, $channelId),
            query: $options,
            headers: [],
            modelClass: Channel::class,
            body: $model
        );
    }
}
