<?php

namespace AboutYou\Cloud\AdminApi;

use AboutYou\Cloud\AdminApi\Models\ApiObject;
use PHPUnit\Framework\TestCase;
use ReflectionProperty;

abstract class BaseApiTestCase extends TestCase
{
    /**
     * @var
     */
    protected $api;

    protected function setUp()
    {
        parent::setUp();

        //Mock Server
        $this->api = new AdminAPI([
            'apiUrl' => \getenv('API_URL') ? \getenv('API_URL') : 'http://127.0.0.1:4010',
            'accessToken' => 'abc123',
        ]);
    }

    /**
     * Gets a protected property from an ApiObject.
     *
     * @param \AboutYou\Cloud\AdminApi\Models\ApiObject $apiObject
     * @param string $propertyName
     *
     * @throws \ReflectionException
     *
     * @return null|mixed
     */
    private function getProtectedProperty($apiObject, $propertyName)
    {
        $reflect = new \ReflectionClass($apiObject);

        $props = $reflect->getProperties(ReflectionProperty::IS_PROTECTED);

        foreach ($props as $prop) {
            if ($prop->getName() === $propertyName) {
                $prop->setAccessible(true);

                return $prop->getValue($apiObject);
            }
        }

        return null;
    }

    /**
     * @param \AboutYou\Cloud\AdminApi\Models\ApiObject $apiObject an ApiObject instance
     * @param string $propertyName the property to type check
     * @param string $className the expected classname
     *
     * @throws \ReflectionException
     */
    protected function assertPropertyHasTheCorrectType($apiObject, $propertyName, $className)
    {
        $attributes = $this->getProtectedProperty($apiObject, '_attributes');

        foreach ($attributes as $objPropertyName => $objPropertyValue) {
            if ($objPropertyName === $propertyName) {
                if (\is_array($objPropertyValue)) {
                    foreach ($objPropertyValue as $objPropertyItem) {
                        static::assertInstanceOf($className, $objPropertyItem);
                    }
                } else {
                    static::assertInstanceOf($className, $objPropertyValue);
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
    protected function assertPropertyHasCorrectPolymorphicType($apiObject, $propertyName, $discriminator, $mapping)
    {
        $attributes = $this->getProtectedProperty($apiObject, '_attributes');

        foreach ($attributes as $objPropertyName => $objPropertyValue) {
            if ($objPropertyName === $propertyName) {
                if (\is_array($objPropertyValue)) {
                    foreach ($objPropertyValue as $objPropertyItem) {
                        $discriminatorValue = $objPropertyItem->{$discriminator};
                        static::assertArrayHasKey($discriminatorValue, $mapping);
                        $className = $mapping[$discriminatorValue];
                        static::assertInstanceOf($className, $objPropertyItem);
                    }
                } else {
                    $discriminatorValue = $objPropertyValue->{$discriminator};
                    $className = $mapping[$discriminatorValue];
                    static::assertArrayHasKey($discriminatorValue, $mapping);
                    static::assertInstanceOf($className, $objPropertyValue);
                }

                break;
            }
        }
    }

    protected function loadFixture(string $filename): array
    {
        $filename = __DIR__ . '/fixtures/' . $filename;
        static::assertFileExists($filename, 'Fixtures do not exist. Are you sure you have valid request and response examples in your OpenAPI specification?');

        return \json_decode(\file_get_contents($filename), true);
    }
}
