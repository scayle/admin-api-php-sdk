<?php

namespace AboutYou\Cloud\AdminApi\Services;

use AboutYou\Cloud\AdminApi\Exceptions\ApiErrorException;
use AboutYou\Cloud\AdminApi\Models\Attribute;
use AboutYou\Cloud\AdminApi\Models\AttributeCollection;
use AboutYou\Cloud\AdminApi\Models\Identifier;
use AboutYou\Cloud\AdminApi\Models\ProductVariant;
use AboutYou\Cloud\AdminApi\Models\ProductVariantCollection;
use Psr\Http\Client\ClientExceptionInterface;

class ProductVariantService extends AbstractService
{
    /**
     * @param Identifier $productIdentifier
     * @param ProductVariant $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @return ProductVariant
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function create($productIdentifier, $model, $options = [])
    {
        return $this->request(
            'post',
            $this->resolvePath('/products/%s/variants', $productIdentifier),
            $options,
            [],
            ProductVariant::class,
            $model
        );
    }

    /**
     * @param Identifier $productIdentifier
     * @param Identifier $variantIdentifier
     * @param array $options additional options like limit or filters
     *
     * @return ProductVariant
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function get($productIdentifier, $variantIdentifier, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/products/%s/variants/%s', $productIdentifier, $variantIdentifier),
            $options,
            [],
            ProductVariant::class,
            null
        );
    }

    /**
     * @param Identifier $productIdentifier
     * @param array $options additional options like limit or filters
     *
     * @return ProductVariantCollection
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function all($productIdentifier, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/products/%s/variants', $productIdentifier),
            $options,
            [],
            ProductVariantCollection::class,
            null
        );
    }

    /**
     * @param Identifier $productIdentifier
     * @param Identifier $variantIdentifier
     * @param ProductVariant $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @return ProductVariant
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function update($productIdentifier, $variantIdentifier, $model, $options = [])
    {
        return $this->request(
            'put',
            $this->resolvePath('/products/%s/variants/%s', $productIdentifier, $variantIdentifier),
            $options,
            [],
            ProductVariant::class,
            $model
        );
    }

    /**
     * @param Identifier $productIdentifier
     * @param Identifier $variantIdentifier
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function delete($productIdentifier, $variantIdentifier, $options = [])
    {
        $this->request(
            'delete',
            $this->resolvePath('/products/%s/variants/%s', $productIdentifier, $variantIdentifier),
            $options,
            [],
            null,
            null
        );
    }

    /**
     * @param Identifier $productIdentifier
     * @param Identifier $variantIdentifier
     * @param Attribute $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @return Attribute
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function updateOrCreateAttribute($productIdentifier, $variantIdentifier, $model, $options = [])
    {
        return $this->request(
            'post',
            $this->resolvePath('/products/%s/variants/%s/attributes', $productIdentifier, $variantIdentifier),
            $options,
            [],
            Attribute::class,
            $model
        );
    }

    /**
     * @param Identifier $productIdentifier
     * @param Identifier $variantIdentifier
     * @param string $attributeGroupName
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function deleteAttribute($productIdentifier, $variantIdentifier, $attributeGroupName, $options = [])
    {
        $this->request(
            'delete',
            $this->resolvePath('/products/%s/variants/%s/attributes/%s', $productIdentifier, $variantIdentifier, $attributeGroupName),
            $options,
            [],
            null,
            null
        );
    }

    /**
     * @param Identifier $productIdentifier
     * @param Identifier $variantIdentifier
     * @param string $attributeGroupName
     * @param array $options additional options like limit or filters
     *
     * @return Attribute
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function getAttribute($productIdentifier, $variantIdentifier, $attributeGroupName, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/products/%s/variants/%s/attributes/%s', $productIdentifier, $variantIdentifier, $attributeGroupName),
            $options,
            [],
            Attribute::class,
            null
        );
    }

    /**
     * @param Identifier $productIdentifier
     * @param Identifier $variantIdentifier
     * @param array $options additional options like limit or filters
     *
     * @return AttributeCollection
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function allAttributes($productIdentifier, $variantIdentifier, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/products/%s/variants/%s/attributes', $productIdentifier, $variantIdentifier),
            $options,
            [],
            AttributeCollection::class,
            null
        );
    }

    /**
     * @param Identifier $variantIdentifier
     * @param array $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @return array
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function createOrUpdateCustomData($variantIdentifier, $model, $options = [])
    {
        return $this->request(
            'put',
            $this->resolvePath('/variants/%s/custom-data', $variantIdentifier),
            $options,
            [],
            null,
            $model
        );
    }

    /**
     * @param Identifier $variantIdentifier
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function deleteCustomData($variantIdentifier, $options = [])
    {
        $this->request(
            'delete',
            $this->resolvePath('/variants/%s/custom-data', $variantIdentifier),
            $options,
            [],
            null,
            null
        );
    }

    /**
     * @param Identifier $variantIdentifier
     * @param array $options additional options like limit or filters
     *
     * @return array
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function getCustomData($variantIdentifier, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/variants/%s/custom-data', $variantIdentifier),
            $options,
            [],
            null,
            null
        );
    }

    /**
     * @param Identifier $variantIdentifier
     * @param string $key
     * @param array $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @return array
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function createOrUpdateCustomDataForKey($variantIdentifier, $key, $model, $options = [])
    {
        return $this->request(
            'put',
            $this->resolvePath('/variants/%s/custom-data/%s', $variantIdentifier, $key),
            $options,
            [],
            null,
            $model
        );
    }

    /**
     * @param Identifier $variantIdentifier
     * @param string $key
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function deleteCustomDataForKey($variantIdentifier, $key, $options = [])
    {
        $this->request(
            'delete',
            $this->resolvePath('/variants/%s/custom-data/%s', $variantIdentifier, $key),
            $options,
            [],
            null,
            null
        );
    }

    /**
     * @param Identifier $variantIdentifier
     * @param string $key
     * @param array $options additional options like limit or filters
     *
     * @return array
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function getCustomDataForKey($variantIdentifier, $key, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/variants/%s/custom-data/%s', $variantIdentifier, $key),
            $options,
            [],
            null,
            null
        );
    }

    /**
     * @param Identifier $productIdentifier
     * @param ProductVariant $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @return ProductVariant
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function createComposite($productIdentifier, $model, $options = [])
    {
        return $this->request(
            'post',
            $this->resolvePath('/products/composite/%s/variants', $productIdentifier),
            $options,
            [],
            ProductVariant::class,
            $model
        );
    }

    /**
     * @param Identifier $productIdentifier
     * @param Identifier $variantIdentifier
     * @param ProductVariant $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @return ProductVariant
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function updateComposite($productIdentifier, $variantIdentifier, $model, $options = [])
    {
        return $this->request(
            'put',
            $this->resolvePath('/products/composite/%s/variants/%s', $productIdentifier, $variantIdentifier),
            $options,
            [],
            ProductVariant::class,
            $model
        );
    }

    /**
     * @param Identifier $productIdentifier
     * @param Identifier $variantIdentifier
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function deleteComposite($productIdentifier, $variantIdentifier, $options = [])
    {
        $this->request(
            'delete',
            $this->resolvePath('/products/composite/%s/variants/%s', $productIdentifier, $variantIdentifier),
            $options,
            [],
            null,
            null
        );
    }
}
