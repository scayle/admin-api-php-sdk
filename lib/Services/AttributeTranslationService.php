<?php

namespace AboutYou\Cloud\AdminApi\Services;

use AboutYou\Cloud\AdminApi\Exceptions\ApiErrorException;
use Psr\Http\Client\ClientExceptionInterface;

class AttributeTranslationService extends AbstractService
{
    /**
     * Description.
     *
     * @param string $attributeName
     * @param array $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function updateOrCreate($attributeName, $model, $options = [])
    {
        $this->request('post', $this->resolvePath('/attributes/%s/translations', $attributeName), $options, null, $model);
    }

    /**
     * Description.
     *
     * @param string $attributeName
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\ArrayCollection
     */
    public function all($attributeName, $options = [])
    {
        return $this->request('get', $this->resolvePath('/attributes/%s/translations', $attributeName), $options, null);
    }
}
