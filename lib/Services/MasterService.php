<?php

namespace AboutYou\Cloud\AdminApi\Services;

use AboutYou\Cloud\AdminApi\Exceptions\ApiErrorException;
use AboutYou\Cloud\AdminApi\Models\Attribute;
use AboutYou\Cloud\AdminApi\Models\AttributeCollection;
use AboutYou\Cloud\AdminApi\Models\Identifier;
use AboutYou\Cloud\AdminApi\Models\ProductMasterCategories;
use Psr\Http\Client\ClientExceptionInterface;

class MasterService extends AbstractService
{
    /**
     * @param Identifier $productMasterIdentifier
     * @param ProductMasterCategories $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @return ProductMasterCategories
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function updateProductMasterMasterCategories($productMasterIdentifier, $model, $options = [])
    {
        return $this->request(
            'put',
            $this->resolvePath('/product-masters/%s/master-categories', $productMasterIdentifier),
            $options,
            [],
            ProductMasterCategories::class,
            $model
        );
    }

    /**
     * @param Identifier $productMasterIdentifier
     * @param array $options additional options like limit or filters
     *
     * @return AttributeCollection
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function allAttributes($productMasterIdentifier, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/product-masters/%s/attributes', $productMasterIdentifier),
            $options,
            [],
            AttributeCollection::class,
            null
        );
    }

    /**
     * @param Identifier $productMasterIdentifier
     * @param Attribute $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @return Attribute
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function updateOrCreateAttribute($productMasterIdentifier, $model, $options = [])
    {
        return $this->request(
            'post',
            $this->resolvePath('/product-masters/%s/attributes', $productMasterIdentifier),
            $options,
            [],
            Attribute::class,
            $model
        );
    }

    /**
     * @param Identifier $productMasterIdentifier
     * @param string $attributeGroupName
     * @param array $options additional options like limit or filters
     *
     * @return Attribute
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function getAttribute($productMasterIdentifier, $attributeGroupName, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/product-masters/%s/attributes/%s', $productMasterIdentifier, $attributeGroupName),
            $options,
            [],
            Attribute::class,
            null
        );
    }

    /**
     * @param Identifier $productMasterIdentifier
     * @param string $attributeGroupName
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function deleteAttribute($productMasterIdentifier, $attributeGroupName, $options = [])
    {
        $this->request(
            'delete',
            $this->resolvePath('/product-masters/%s/attributes/%s', $productMasterIdentifier, $attributeGroupName),
            $options,
            [],
            null,
            null
        );
    }
}
