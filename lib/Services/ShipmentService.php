<?php

namespace AboutYou\Cloud\AdminApi\Services;

use AboutYou\Cloud\AdminApi\Exceptions\ApiErrorException;
use AboutYou\Cloud\AdminApi\Helpers\ArrayHelper;
use AboutYou\Cloud\AdminApi\Models\Shipment;
use Psr\Http\Client\ClientExceptionInterface;

class ShipmentService extends AbstractService
{
    /**
     * @param Shipment $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function create($model, $options = [])
    {
        $this->request(
            'post',
            $this->resolvePath('/fulfillment/shipments'),
            ArrayHelper::except($options, ['companyId']),
            ['X-Company-Id' => ArrayHelper::get($options, 'companyId')],
            null,
            $model
        );
    }
}
