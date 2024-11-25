<?php

namespace AboutYou\Cloud\AdminApi\Services;

use AboutYou\Cloud\AdminApi\Exceptions\ApiErrorException;
use AboutYou\Cloud\AdminApi\Models\Redirect;
use AboutYou\Cloud\AdminApi\Models\RedirectCollection;
use Psr\Http\Client\ClientExceptionInterface;

class RedirectService extends AbstractService
{
    /**
     * @param string $shopKey
     * @param array $options additional options like limit or filters
     *
     * @return RedirectCollection
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function all($shopKey, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/shops/%s/redirects', $shopKey),
            $options,
            [],
            RedirectCollection::class,
            null
        );
    }

    /**
     * @param string $shopKey
     * @param Redirect[] $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @return RedirectCollection
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function createOrUpdateBulk($shopKey, $model, $options = [])
    {
        return $this->request(
            'put',
            $this->resolvePath('/shops/%s/redirects/bulk', $shopKey),
            $options,
            [],
            RedirectCollection::class,
            $model
        );
    }

    /**
     * @param string $shopKey
     * @param Redirect[] $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function deleteBulk($shopKey, $model, $options = [])
    {
        $this->request(
            'delete',
            $this->resolvePath('/shops/%s/redirects/bulk', $shopKey),
            $options,
            [],
            null,
            $model
        );
    }

    /**
     * @param string $shopKey
     * @param int $redirectId
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function delete($shopKey, $redirectId, $options = [])
    {
        $this->request(
            'delete',
            $this->resolvePath('/shops/%s/redirects/%s', $shopKey, $redirectId),
            $options,
            [],
            null,
            null
        );
    }

    /**
     * @param string $shopKey
     * @param Redirect $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @return Redirect
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function create($shopKey, $model, $options = [])
    {
        return $this->request(
            'post',
            $this->resolvePath('/shops/%s/redirects', $shopKey),
            $options,
            [],
            Redirect::class,
            $model
        );
    }

    /**
     * @param string $shopKey
     * @param int $redirectId
     * @param Redirect $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @return Redirect
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function update($shopKey, $redirectId, $model, $options = [])
    {
        return $this->request(
            'put',
            $this->resolvePath('/shops/%s/redirects/%s', $shopKey, $redirectId),
            $options,
            [],
            Redirect::class,
            $model
        );
    }
}
