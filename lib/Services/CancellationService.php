<?php

namespace AboutYou\Cloud\AdminApi\Services;

use AboutYou\Cloud\AdminApi\Exceptions\ApiErrorException;
use AboutYou\Cloud\AdminApi\Helpers\ArrayHelper;
use Psr\Http\Client\ClientExceptionInterface;

class CancellationService extends AbstractService
{
    /**
     * Description.
     *
     * @param \AboutYou\Cloud\AdminApi\Models\Cancellation $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function send($model, $options = [])
    {
        $this->request(
            'post',
            $this->resolvePath('/fulfillment/cancellations'),
            ArrayHelper::except($options, ['companyId']),
            ['X-Company-Id' => ArrayHelper::get($options, 'companyId')],
            null,
            $model
        );
    }
}
