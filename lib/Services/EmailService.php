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
use Scayle\Cloud\AdminApi\Models\Email;

class EmailService extends AbstractService
{
    /**
     * @param Email $model the model to create or update
     * @param array<string, mixed> $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function send(
        string $shopKey,
        string $countryCode,
        Email $model,
        array $options = []
    ): void {
        $this->request(
            method: 'post',
            relativeUrl: $this->resolvePath('/shops/%s/countries/%s/emails/send', $shopKey, $countryCode),
            query: $options,
            headers: [],
            modelClass: null,
            body: $model
        );
    }
}
