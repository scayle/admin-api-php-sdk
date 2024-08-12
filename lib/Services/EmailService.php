<?php

namespace AboutYou\Cloud\AdminApi\Services;

use AboutYou\Cloud\AdminApi\Exceptions\ApiErrorException;
use AboutYou\Cloud\AdminApi\Models\Email;
use Psr\Http\Client\ClientExceptionInterface;

class EmailService extends AbstractService
{
    /**
     * @param string $shopKey
     * @param string $countryCode
     * @param Email $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function send($shopKey, $countryCode, $model, $options = [])
    {
        $this->request(
            'post',
            $this->resolvePath('/shops/%s/countries/%s/emails/send', $shopKey, $countryCode),
            $options,
            [],
            null,
            $model
        );
    }
}
