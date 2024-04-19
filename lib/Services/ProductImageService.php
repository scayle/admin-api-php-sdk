<?php

namespace AboutYou\Cloud\AdminApi\Services;

use AboutYou\Cloud\AdminApi\Exceptions\ApiErrorException;
use AboutYou\Cloud\AdminApi\Models\Attribute;
use AboutYou\Cloud\AdminApi\Models\AttributeCollection;
use AboutYou\Cloud\AdminApi\Models\Identifier;
use AboutYou\Cloud\AdminApi\Models\ProductImage;
use AboutYou\Cloud\AdminApi\Models\ProductImageCollection;
use AboutYou\Cloud\AdminApi\Models\ProductImagePosition;
use Psr\Http\Client\ClientExceptionInterface;

class ProductImageService extends AbstractService
{
    /**
     * @param Identifier $productIdentifier
     * @param ProductImage $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @return ProductImage
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function create($productIdentifier, $model, $options = [])
    {
        return $this->request(
            'post',
            $this->resolvePath('/products/%s/images', $productIdentifier),
            $options,
            [],
            ProductImage::class,
            $model
        );
    }

    /**
     * @param Identifier $productIdentifier
     * @param array $options additional options like limit or filters
     *
     * @return ProductImageCollection
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function all($productIdentifier, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/products/%s/images', $productIdentifier),
            $options,
            [],
            ProductImageCollection::class,
            null
        );
    }

    /**
     * @param Identifier $productIdentifier
     * @param Identifier $imageIdentifier
     * @param ProductImagePosition $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @return ProductImage
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function updatePosition($productIdentifier, $imageIdentifier, $model, $options = [])
    {
        return $this->request(
            'patch',
            $this->resolvePath('/products/%s/images/%s', $productIdentifier, $imageIdentifier),
            $options,
            [],
            ProductImage::class,
            $model
        );
    }

    /**
     * @param Identifier $productIdentifier
     * @param Identifier $imageIdentifier
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function delete($productIdentifier, $imageIdentifier, $options = [])
    {
        $this->request(
            'delete',
            $this->resolvePath('/products/%s/images/%s', $productIdentifier, $imageIdentifier),
            $options,
            [],
            null,
            null
        );
    }

    /**
     * @param Identifier $productIdentifier
     * @param Identifier $imageIdentifier
     * @param Attribute $model the model to create or update
     * @param array $options additional options like limit or filters
     *
     * @return Attribute
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function updateOrCreateAttribute($productIdentifier, $imageIdentifier, $model, $options = [])
    {
        return $this->request(
            'post',
            $this->resolvePath('/products/%s/images/%s/attributes', $productIdentifier, $imageIdentifier),
            $options,
            [],
            Attribute::class,
            $model
        );
    }

    /**
     * @param Identifier $productIdentifier
     * @param Identifier $imageIdentifier
     * @param string $attributeGroupName
     * @param array $options additional options like limit or filters
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function deleteAttribute($productIdentifier, $imageIdentifier, $attributeGroupName, $options = [])
    {
        $this->request(
            'delete',
            $this->resolvePath('/products/%s/images/%s/attributes/%s', $productIdentifier, $imageIdentifier, $attributeGroupName),
            $options,
            [],
            null,
            null
        );
    }

    /**
     * @param Identifier $productIdentifier
     * @param Identifier $imageIdentifier
     * @param string $attributeGroupName
     * @param array $options additional options like limit or filters
     *
     * @return Attribute
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function getAttribute($productIdentifier, $imageIdentifier, $attributeGroupName, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/products/%s/images/%s/attributes/%s', $productIdentifier, $imageIdentifier, $attributeGroupName),
            $options,
            [],
            Attribute::class,
            null
        );
    }

    /**
     * @param Identifier $productIdentifier
     * @param Identifier $imageIdentifier
     * @param array $options additional options like limit or filters
     *
     * @return AttributeCollection
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function allAttributes($productIdentifier, $imageIdentifier, $options = [])
    {
        return $this->request(
            'get',
            $this->resolvePath('/products/%s/images/%s/attributes', $productIdentifier, $imageIdentifier),
            $options,
            [],
            AttributeCollection::class,
            null
        );
    }
}
