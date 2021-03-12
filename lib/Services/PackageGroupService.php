<?php

namespace AboutYou\Cloud\AdminApi\Services;

use AboutYou\Cloud\AdminApi\Exceptions\ApiErrorException;
use Psr\Http\Client\ClientExceptionInterface;

class PackageGroupService extends AbstractService
{
    /**
     * Description.
     *
     * @param string $shopKey
     * @param string $countryCode
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\PackageGroupCollection
     */
    public function all($shopKey, $countryCode, $options = [])
    {
        return $this->request('get', $this->resolvePath('/shops/%s/countries/%s/package-groups', $shopKey, $countryCode), $options, \AboutYou\Cloud\AdminApi\Models\PackageGroupCollection::class);
    }

    /**
     * Description.
     *
     * @param string $shopKey
     * @param string $countryCode
     * @param int $packageGroupId
     * @param \AboutYou\Cloud\AdminApi\Models\PackageGroupWarehouse[] $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function assignPackageGroupToWarehouses($shopKey, $countryCode, $packageGroupId, $model, $options = [])
    {
        $this->request('post', $this->resolvePath('/shops/%s/countries/%s/package-groups/%s', $shopKey, $countryCode, $packageGroupId), $options, null, $model);
    }

    /**
     * Description.
     *
     * @param string $shopKey
     * @param string $countryCode
     * @param int $packageGroupId
     * @param \AboutYou\Cloud\AdminApi\Models\PackageGroupWarehouse[] $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function replacePackageGroupForWarehouses($shopKey, $countryCode, $packageGroupId, $model, $options = [])
    {
        $this->request('put', $this->resolvePath('/shops/%s/countries/%s/package-groups/%s', $shopKey, $countryCode, $packageGroupId), $options, null, $model);
    }

    /**
     * Description.
     *
     * @param string $shopKey
     * @param string $countryCode
     * @param int $packageGroupId
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function delete($shopKey, $countryCode, $packageGroupId, $options = [])
    {
        $this->request('delete', $this->resolvePath('/shops/%s/countries/%s/package-groups/%s', $shopKey, $countryCode, $packageGroupId), $options, null);
    }
}
