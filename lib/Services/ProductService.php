<?php

namespace AboutYou\Cloud\AdminApi\Services;

use AboutYou\Cloud\AdminApi\Exceptions\ApiErrorException;
use AboutYou\Cloud\AdminApi\Models\Attribute;
use AboutYou\Cloud\AdminApi\Models\AttributeCollection;
use AboutYou\Cloud\AdminApi\Models\Identifier;
use AboutYou\Cloud\AdminApi\Models\Product;
use AboutYou\Cloud\AdminApi\Models\ProductCollection;
use AboutYou\Cloud\AdminApi\Models\ProductMasterCategories;
use AboutYou\Cloud\AdminApi\Models\ProductState;
use Psr\Http\Client\ClientExceptionInterface;

class ProductService extends AbstractService
{
    /**
     * @param Product $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @return Product
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function create($model, $options = [])
    {
        return $this->request(
            'post',
            $this->resolvePath('/products'),
            $options,
            [],
            Product::class,
            $model
        );
    }

    /**
     * @param Identifier $productIdentifier
     * @param array $options additional options like limit or filters
     *
     * @return Product
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function get($productIdentifier, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/products/%s', $productIdentifier),
            $options,
            [],
            Product::class,
            null
        );
    }

    /**
     * @param array $options additional options like limit or filters
     *
     * @return ProductCollection
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function all($options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/products'),
            $options,
            [],
            ProductCollection::class,
            null
        );
    }

    /**
     * @param Identifier $productIdentifier
     * @param Product $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @return Product
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function update($productIdentifier, $model, $options = [])
    {
        return $this->request(
            'put',
            $this->resolvePath('/products/%s', $productIdentifier),
            $options,
            [],
            Product::class,
            $model
        );
    }

    /**
     * @param Identifier $productIdentifier
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
     * @param Identifier $productIdentifier
     * @param Attribute $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @return Attribute
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function updateOrCreateAttribute($productIdentifier, $model, $options = [])
    {
        return $this->request(
            'post',
            $this->resolvePath('/products/%s/attributes', $productIdentifier),
            $options,
            [],
            Attribute::class,
            $model
        );
    }

    /**
     * @param Identifier $productIdentifier
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
     * @param Identifier $productIdentifier
     * @param string $attributeGroupName
     * @param array $options additional options like limit or filters
     *
     * @return Attribute
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function getAttribute($productIdentifier, $attributeGroupName, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/products/%s/attributes/%s', $productIdentifier, $attributeGroupName),
            $options,
            [],
            Attribute::class,
            null
        );
    }

    /**
     * @param Identifier $productIdentifier
     * @param array $options additional options like limit or filters
     *
     * @return AttributeCollection
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function allAttributes($productIdentifier, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/products/%s/attributes', $productIdentifier),
            $options,
            [],
            AttributeCollection::class,
            null
        );
    }

    /**
     * @param Identifier $productIdentifier
     * @param ProductMasterCategories $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @return ProductMasterCategories
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function updateMasterCategories($productIdentifier, $model, $options = [])
    {
        return $this->request(
            'put',
            $this->resolvePath('/products/%s/master-categories', $productIdentifier),
            $options,
            [],
            ProductMasterCategories::class,
            $model
        );
    }

    /**
     * @param Identifier $productIdentifier
     * @param array $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @return array
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
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
     * @param Identifier $productIdentifier
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
     * @param Identifier $productIdentifier
     * @param array $options additional options like limit or filters
     *
     * @return array
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
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
     * @param Identifier $productIdentifier
     * @param string $key
     * @param array $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @return array
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
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
     * @param Identifier $productIdentifier
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
     * @param Identifier $productIdentifier
     * @param string $key
     * @param array $options additional options like limit or filters
     *
     * @return array
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
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
     * @param Product $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @return Product
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function createComposite($model, $options = [])
    {
        return $this->request(
            'post',
            $this->resolvePath('/products/composite'),
            $options,
            [],
            Product::class,
            $model
        );
    }

    /**
     * @param Identifier $productIdentifier
     * @param Product $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @return Product
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function updateComposite($productIdentifier, $model, $options = [])
    {
        return $this->request(
            'put',
            $this->resolvePath('/products/composite/%s', $productIdentifier),
            $options,
            [],
            Product::class,
            $model
        );
    }

    /**
     * @param Identifier $productIdentifier
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
     * @param Identifier $productIdentifier
     * @param ProductState $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @return ProductState
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function updateState($productIdentifier, $model, $options = [])
    {
        return $this->request(
            'put',
            $this->resolvePath('/products/%s/state', $productIdentifier),
            $options,
            [],
            ProductState::class,
            $model
        );
    }
}
