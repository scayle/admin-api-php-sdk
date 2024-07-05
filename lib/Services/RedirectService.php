<?php

namespace AboutYou\Cloud\AdminApi\Services;

use AboutYou\Cloud\AdminApi\Exceptions\ApiErrorException;
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
}
