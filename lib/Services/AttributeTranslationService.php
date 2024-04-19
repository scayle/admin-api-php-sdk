<?php

namespace AboutYou\Cloud\AdminApi\Services;

use AboutYou\Cloud\AdminApi\Exceptions\ApiErrorException;
use AboutYou\Cloud\AdminApi\Models\ArrayCollection;
use Psr\Http\Client\ClientExceptionInterface;

class AttributeTranslationService extends AbstractService
{
    /**
     * @param string $attributeGroupName
     * @param array $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function updateOrCreate($attributeGroupName, $model, $options = [])
    {
        $this->request(
            'post',
            $this->resolvePath('/attributes/%s/translations', $attributeGroupName),
            $options,
            [],
            null,
            $model
        );
    }

    /**
     * @param string $attributeGroupName
     * @param array $options additional options like limit or filters
     *
     * @return ArrayCollection
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function all($attributeGroupName, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/attributes/%s/translations', $attributeGroupName),
            $options,
            [],
            ArrayCollection::class,
            null
        );
    }
}
