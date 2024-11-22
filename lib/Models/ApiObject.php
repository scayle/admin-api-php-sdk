<?php

namespace AboutYou\Cloud\AdminApi\Models;

abstract class ApiObject implements \JsonSerializable, \Stringable
{
    /**
     * @var array
     */
    protected $_attributes;

    /**
     * @var array
     */
    protected $defaultValues = [];

    /**
     * @var array
     */
    protected $classMap = [];

    /**
     * @var array
     */
    protected $polymorphic = [];

    /**
     * @var array
     */
    protected $polymorphicCollections = [];

    /**
     * @var array
     */
    protected $collectionClassMap = [];

    public function __construct($attributes = [])
    {
        $attributes = $this->mergeDefaultValues($attributes);
        $this->_attributes = $this->unserialize($attributes);
    }

    public function __set($name, $value)
    {
        $this->_attributes[$name] = $value;
    }

    public function &__get($name)
    {
        $attribute = null;

        if (\array_key_exists($name, $this->_attributes)) {
            $attribute = &$this->_attributes[$name];
        }

        return $attribute;
    }

    public function __unset($name)
    {
        unset($this->_attributes[$name]);
    }

    public function __isset($name)
    {
        return isset($this->_attributes[$name]);
    }

    public function jsonSerialize(): array
    {
        $serialized = [];

        foreach ($this->_attributes as $key => $value) {
            if ($value instanceof ApiObject) {
                $value = $value->jsonSerialize();
            }

            $serialized[$key] = $value;
        }

        return $serialized;
    }

    /**
     * @return false|string
     */
    public function toJson()
    {
        return json_encode($this->_attributes);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->toJson() ?: '';
    }

    /**
     * @param array $attributes
     *
     * @return array mixed
     */
    private function mergeDefaultValues($attributes)
    {
        $attributes = !\is_array($attributes) ? [] : $attributes;
        $diff = array_diff_key($this->defaultValues, $attributes);

        return array_merge($attributes, $diff);
    }

    /**
     * @param array $attributes
     *
     * @return array
     */
    private function unserialize($attributes)
    {
        $unserialized = [];

        foreach ($attributes as $key => $value) {
            if (null === $value) {
                $unserialized[$key] = $value;

                continue;
            }

            // Handle nested single object instantiation
            if (\array_key_exists($key, $this->classMap)) {
                $value = new $this->classMap[$key]($value);
            }

            // Handle nested object collection instantiation
            if (\array_key_exists($key, $this->collectionClassMap)) {
                $nestedObjects = [];
                foreach ($value as $nestedValue) {
                    $nestedObjects[] = new $this->collectionClassMap[$key]($nestedValue);
                }

                $value = $nestedObjects;
            }

            // Handle single nested object polymorphism
            if (\array_key_exists($key, $this->polymorphic)) {
                $discriminator = $this->polymorphic[$key]['discriminator'];
                $discriminatorValue = $attributes[$discriminator];
                $className = $this->polymorphic[$key]['mapping'][$discriminatorValue];
                $value = new $className([$key => $value]);
            }

            // Handle nested object collection polymorphism
            if (\array_key_exists($key, $this->polymorphicCollections)) {
                $discriminator = $this->polymorphicCollections[$key]['discriminator'];
                $objects = [];
                foreach ($attributes[$key] as $nestedAttribute) {
                    $discriminatorValue = $nestedAttribute[$discriminator];
                    if (\array_key_exists($discriminatorValue, $this->polymorphicCollections[$key]['mapping'])) {
                        $className = $this->polymorphicCollections[$key]['mapping'][$discriminatorValue];
                        $objects[] = new $className($nestedAttribute);
                    }
                }

                $value = $objects;
            }

            $unserialized[$key] = $value;
        }

        return $unserialized;
    }
}
