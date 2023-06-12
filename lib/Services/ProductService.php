<?php

namespace AboutYou\Cloud\AdminApi\Services;

use AboutYou\Cloud\AdminApi\Exceptions\ApiErrorException;
use Psr\Http\Client\ClientExceptionInterface;

class ProductService extends AbstractService
{
    /**
     * @param \AboutYou\Cloud\AdminApi\Models\Product $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\Product
     */
    public function create($model, $options = [])
    {
        return $this->request(
            'post',
            $this->resolvePath('/products'),
            $options,
            [],
            \AboutYou\Cloud\AdminApi\Models\Product::class,
            $model
        );
    }

    /**
     * @param \AboutYou\Cloud\AdminApi\Models\Identifier $productIdentifier
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\Product
     */
    public function get($productIdentifier, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/products/%s', $productIdentifier),
            $options,
            [],
            \AboutYou\Cloud\AdminApi\Models\Product::class,
            null
        );
    }

    /**
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\ProductCollection
     */
    public function all($options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/products'),
            $options,
            [],
            \AboutYou\Cloud\AdminApi\Models\ProductCollection::class,
            null
        );
    }

    /**
     * @param \AboutYou\Cloud\AdminApi\Models\Identifier $productIdentifier
     * @param \AboutYou\Cloud\AdminApi\Models\Product $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\Product
     */
    public function update($productIdentifier, $model, $options = [])
    {
        return $this->request(
            'put',
            $this->resolvePath('/products/%s', $productIdentifier),
            $options,
            [],
            \AboutYou\Cloud\AdminApi\Models\Product::class,
            $model
        );
    }

    /**
     * @param \AboutYou\Cloud\AdminApi\Models\Identifier $productIdentifier
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function delete($productIdentifier, $options = [])
    {
        $this->request(
            'delete',
            $this->resolvePath('/products/%s', $productIdentifier),
            $options,
            [],
            null,
            null
        );
    }

    /**
     * @param \AboutYou\Cloud\AdminApi\Models\Identifier $productIdentifier
     * @param \AboutYou\Cloud\AdminApi\Models\Attribute $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\Attribute
     */
    public function updateOrCreateAttribute($productIdentifier, $model, $options = [])
    {
        return $this->request(
            'post',
            $this->resolvePath('/products/%s/attributes', $productIdentifier),
            $options,
            [],
            \AboutYou\Cloud\AdminApi\Models\Attribute::class,
            $model
        );
    }

    /**
     * @param \AboutYou\Cloud\AdminApi\Models\Identifier $productIdentifier
     * @param string $attributeGroupName
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function deleteAttribute($productIdentifier, $attributeGroupName, $options = [])
    {
        $this->request(
            'delete',
            $this->resolvePath('/products/%s/attributes/%s', $productIdentifier, $attributeGroupName),
            $options,
            [],
            null,
            null
        );
    }

    /**
     * @param \AboutYou\Cloud\AdminApi\Models\Identifier $productIdentifier
     * @param string $attributeGroupName
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\Attribute
     */
    public function getAttribute($productIdentifier, $attributeGroupName, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/products/%s/attributes/%s', $productIdentifier, $attributeGroupName),
            $options,
            [],
            \AboutYou\Cloud\AdminApi\Models\Attribute::class,
            null
        );
    }

    /**
     * @param \AboutYou\Cloud\AdminApi\Models\Identifier $productIdentifier
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\AttributeCollection
     */
    public function allAttributes($productIdentifier, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/products/%s/attributes', $productIdentifier),
            $options,
            [],
            \AboutYou\Cloud\AdminApi\Models\AttributeCollection::class,
            null
        );
    }

    /**
     * @param \AboutYou\Cloud\AdminApi\Models\Identifier $productIdentifier
     * @param \AboutYou\Cloud\AdminApi\Models\ProductMasterCategories $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\ProductMasterCategories
     */
    public function updateMasterCategories($productIdentifier, $model, $options = [])
    {
        return $this->request(
            'put',
            $this->resolvePath('/products/%s/master-categories', $productIdentifier),
            $options,
            [],
            \AboutYou\Cloud\AdminApi\Models\ProductMasterCategories::class,
            $model
        );
    }

    /**
     * @param \AboutYou\Cloud\AdminApi\Models\Identifier $productIdentifier
     * @param array $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return array
     */
    public function createOrUpdateCustomData($productIdentifier, $model, $options = [])
    {
        return $this->request(
            'put',
            $this->resolvePath('/products/%s/custom-data', $productIdentifier),
            $options,
            [],
            null,
            $model
        );
    }

    /**
     * @param \AboutYou\Cloud\AdminApi\Models\Identifier $productIdentifier
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function deleteCustomData($productIdentifier, $options = [])
    {
        $this->request(
            'delete',
            $this->resolvePath('/products/%s/custom-data', $productIdentifier),
            $options,
            [],
            null,
            null
        );
    }

    /**
     * @param \AboutYou\Cloud\AdminApi\Models\Identifier $productIdentifier
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return array
     */
    public function getCustomData($productIdentifier, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/products/%s/custom-data', $productIdentifier),
            $options,
            [],
            null,
            null
        );
    }

    /**
     * @param \AboutYou\Cloud\AdminApi\Models\Identifier $productIdentifier
     * @param string $key
     * @param array $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return array
     */
    public function createOrUpdateCustomDataForKey($productIdentifier, $key, $model, $options = [])
    {
        return $this->request(
            'put',
            $this->resolvePath('/products/%s/custom-data/%s', $productIdentifier, $key),
            $options,
            [],
            null,
            $model
        );
    }

    /**
     * @param \AboutYou\Cloud\AdminApi\Models\Identifier $productIdentifier
     * @param string $key
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function deleteCustomDataForKey($productIdentifier, $key, $options = [])
    {
        $this->request(
            'delete',
            $this->resolvePath('/products/%s/custom-data/%s', $productIdentifier, $key),
            $options,
            [],
            null,
            null
        );
    }

    /**
     * @param \AboutYou\Cloud\AdminApi\Models\Identifier $productIdentifier
     * @param string $key
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return array
     */
    public function getCustomDataForKey($productIdentifier, $key, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/products/%s/custom-data/%s', $productIdentifier, $key),
            $options,
            [],
            null,
            null
        );
    }

    /**
     * @param \AboutYou\Cloud\AdminApi\Models\Product $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\Product
     */
    public function createComposite($model, $options = [])
    {
        return $this->request(
            'post',
            $this->resolvePath('/products/composite'),
            $options,
            [],
            \AboutYou\Cloud\AdminApi\Models\Product::class,
            $model
        );
    }

    /**
     * @param \AboutYou\Cloud\AdminApi\Models\Identifier $productIdentifier
     * @param \AboutYou\Cloud\AdminApi\Models\Product $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\Product
     */
    public function updateComposite($productIdentifier, $model, $options = [])
    {
        return $this->request(
            'put',
            $this->resolvePath('/products/composite/%s', $productIdentifier),
            $options,
            [],
            \AboutYou\Cloud\AdminApi\Models\Product::class,
            $model
        );
    }

    /**
     * @param \AboutYou\Cloud\AdminApi\Models\Identifier $productIdentifier
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function deleteComposite($productIdentifier, $options = [])
    {
        $this->request(
            'delete',
            $this->resolvePath('/products/composite/%s', $productIdentifier),
            $options,
            [],
            null,
            null
        );
    }

    /**
     * @param \AboutYou\Cloud\AdminApi\Models\Identifier $productIdentifier
     * @param \AboutYou\Cloud\AdminApi\Models\ProductState $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     *
     * @return \AboutYou\Cloud\AdminApi\Models\ProductState
     */
    public function updateState($productIdentifier, $model, $options = [])
    {
        return $this->request(
            'put',
            $this->resolvePath('/products/%s/state', $productIdentifier),
            $options,
            [],
            \AboutYou\Cloud\AdminApi\Models\ProductState::class,
            $model
        );
    }
}
