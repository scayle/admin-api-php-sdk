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
use Scayle\Cloud\AdminApi\Models\Asset;
use Scayle\Cloud\AdminApi\Models\AssetUrl;

class AssetService extends AbstractService
{
    /**
     * @param Asset $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function create(
        Asset $model,
        array $options = []
    ): AssetUrl {
        return $this->request(
            method: 'post',
            relativeUrl: $this->resolvePath('/assets'),
            query: $options,
            headers: [],
            modelClass: AssetUrl::class,
            body: $model
        );
    }
}
