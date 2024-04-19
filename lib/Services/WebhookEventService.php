<?php

namespace AboutYou\Cloud\AdminApi\Services;

use AboutYou\Cloud\AdminApi\Exceptions\ApiErrorException;
use AboutYou\Cloud\AdminApi\Models\WebhookEventCollection;
use Psr\Http\Client\ClientExceptionInterface;

class WebhookEventService extends AbstractService
{
    /**
     * @param array $options additional options like limit or filters
     *
     * @return WebhookEventCollection
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function all($options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/webhooks/events'),
            $options,
            [],
            WebhookEventCollection::class,
            null
        );
    }
}
