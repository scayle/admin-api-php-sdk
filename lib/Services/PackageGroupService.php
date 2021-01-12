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
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\PackageGroupCollection
     */
    public function all($shopKey, $options = [])
    {
        return $this->request('get', $this->resolvePath('/shops/%s/package-groups', $shopKey), $options, \AboutYou\Cloud\AdminApi\Models\PackageGroupCollection::class);
    }

    /**
     * Description.
     *
     * @param string $shopKey
     * @param int $packageGroupId
     * @param \AboutYou\Cloud\AdminApi\Models\PackageGroupWarehouse[] $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function assignPackageGroupToWarehouses($shopKey, $packageGroupId, $model, $options = [])
    {
        $this->request('post', $this->resolvePath('/shops/%s/package-groups/%s', $shopKey, $packageGroupId), $options, null, $model);
    }

    /**
     * Description.
     *
     * @param string $shopKey
     * @param int $packageGroupId
     * @param \AboutYou\Cloud\AdminApi\Models\PackageGroupWarehouse[] $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function replacePackageGroupForWarehouses($shopKey, $packageGroupId, $model, $options = [])
    {
        $this->request('put', $this->resolvePath('/shops/%s/package-groups/%s', $shopKey, $packageGroupId), $options, null, $model);
    }

    /**
     * Description.
     *
     * @param string $shopKey
     * @param int $packageGroupId
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function delete($shopKey, $packageGroupId, $options = [])
    {
        $this->request('delete', $this->resolvePath('/shops/%s/package-groups/%s', $shopKey, $packageGroupId), $options, null);
    }
}
