<?php

namespace AboutYou\Cloud\AdminApi\Services;

use AboutYou\Cloud\AdminApi\Exceptions\ApiErrorException;
use Psr\Http\Client\ClientExceptionInterface;

class BrandService extends AbstractService
{
    /**
     * Description.
     *
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\BrandCollection
     */
    public function all($options = [])
    {
        return $this->request('get', '/brands', $options, \AboutYou\Cloud\AdminApi\Models\BrandCollection::class);
    }

    /**
     * Description.
     *
     * @param int $brandId
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\Brand
     */
    public function get($brandId, $options = [])
    {
        return $this->request('get', $this->resolvePath('/brands/%s', $brandId), $options, \AboutYou\Cloud\AdminApi\Models\Brand::class);
    }
}
