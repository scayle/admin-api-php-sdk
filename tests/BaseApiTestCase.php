<?php

declare(strict_types=1);

/*
 * This file is part of the AdminAPI PHP SDK provided by SCAYLE GmbH.
 *
 * (c) SCAYLE GmbH <https://www.scayle.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Scayle\Cloud\AdminApi;

use PHPUnit\Framework\TestCase;
use Scayle\Cloud\AdminApi\Models\ApiObject;

abstract class BaseApiTestCase extends TestCase
{
    protected AdminAPI $api;

    protected function setUp(): void
    {
        parent::setUp();

        // Mock Server
        $this->api = new AdminAPI([
            'apiUrl' => getenv('API_URL') ? getenv('API_URL') : 'http://127.0.0.1:4010',
            'accessToken' => 'abc123',
        ]);
    }

    /**
     * Gets a protected property from an ApiObject.
     *
     * @return null|mixed
     *
     * @throws \ReflectionException
     */
    private function getProtectedProperty(ApiObject $apiObject, string $propertyName)
    {
        $reflect = new \ReflectionClass($apiObject);

        $props = $reflect->getProperties(\ReflectionProperty::IS_PROTECTED);

        foreach ($props as $prop) {
            if ($prop->getName() === $propertyName) {
                $prop->setAccessible(true);

                return $prop->getValue($apiObject);
            }
        }

        return null;
    }

    /**
     * @param ApiObject $apiObject an ApiObject instance
     * @param string $propertyName the property to type check
     * @param string $className the expected classname
     *
     * @throws \ReflectionException
     */
    protected function assertPropertyHasTheCorrectType(
        ApiObject $apiObject,
        string $propertyName,
        string $className
    ): void {
        $attributes = $this->getProtectedProperty($apiObject, '_attributes');

        foreach ($attributes as $objPropertyName => $objPropertyValue) {
            if ($objPropertyName === $propertyName) {
                if (\is_array($objPropertyValue)) {
                    foreach ($objPropertyValue as $objPropertyItem) {
                        self::assertInstanceOf($className, $objPropertyItem);
                    }
                } else {
                    self::assertInstanceOf($className, $objPropertyValue);
                }

                break;
            }
        }
    }

    /**
     * @param ApiObject $apiObject an ApiObject instance
     * @param string $propertyName the property to type check
     * @param string $discriminator the discriminator field name
     * @param array<string, string> $mapping mapping of discriminator value to concrete class
     *
     * @throws \ReflectionException
     */
    protected function assertPropertyHasCorrectPolymorphicType(
        ApiObject $apiObject,
        string $propertyName,
        string $discriminator,
        array $mapping
    ): void {
        $attributes = $this->getProtectedProperty($apiObject, '_attributes');

        foreach ($attributes as $objPropertyName => $objPropertyValue) {
            if ($objPropertyName === $propertyName) {
                if (\is_array($objPropertyValue)) {
                    foreach ($objPropertyValue as $objPropertyItem) {
                        $discriminatorValue = $objPropertyItem->{$discriminator};
                        self::assertArrayHasKey($discriminatorValue, $mapping);
                        $className = $mapping[$discriminatorValue];
                        self::assertInstanceOf($className, $objPropertyItem);
                    }
                } else {
                    $discriminatorValue = $objPropertyValue->{$discriminator};
                    $className = $mapping[$discriminatorValue];
                    self::assertArrayHasKey($discriminatorValue, $mapping);
                    self::assertInstanceOf($className, $objPropertyValue);
                }

                break;
            }
        }
    }

    /**
     * @return array<mixed>
     */
    protected function loadFixture(string $filename): array
    {
        $filename = __DIR__ . '/fixtures/' . $filename;
        self::assertFileExists($filename, 'Fixtures do not exist. Are you sure you have valid request and response examples in your OpenAPI specification?');

        return json_decode(file_get_contents($filename), true);
    }
}
