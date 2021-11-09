<?php

namespace AboutYou\Cloud\AdminApi\Services;

use AboutYou\Cloud\AdminApi\Exceptions\ApiErrorException;
use Psr\Http\Client\ClientExceptionInterface;

class WebhookEventService extends AbstractService
{
    /**
     * Description.
     *
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\WebhookEventCollection
     */
    public function all($options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/webhooks/events'),
            $options,
            [],
            \AboutYou\Cloud\AdminApi\Models\WebhookEventCollection::class,
            null
        );
    }
}
