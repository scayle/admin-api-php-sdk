<?php

namespace AboutYou\Cloud\AdminApi;

use AboutYou\Cloud\AdminApi\Services\ServiceFactory;

/**
 * Allows access to AdminApi functions.
 *
 * @property \AboutYou\Cloud\AdminApi\Services\ProductService $products
 * @property \AboutYou\Cloud\AdminApi\Services\ProductImageService $productImages
 * @property \AboutYou\Cloud\AdminApi\Services\ProductVariantService $productVariants
 * @property \AboutYou\Cloud\AdminApi\Services\ProductVariantPriceService $productVariantPrices
 * @property \AboutYou\Cloud\AdminApi\Services\AttributeTranslationService $attributeTranslations
 * @property \AboutYou\Cloud\AdminApi\Services\ProductVariantStockService $productVariantStocks
 */
class AdminAPI extends AbstractApi
{
	/**
	 * @var ServiceFactory $serviceFactory
	 */
	private $serviceFactory;

	public function __get($name)
	{
		if ($this->serviceFactory === null) {
            $this->serviceFactory = new ServiceFactory($this);
        }

        return $this->serviceFactory->get($name);
    }
}