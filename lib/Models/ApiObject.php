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

namespace Scayle\Cloud\AdminApi\Models;

abstract class ApiObject implements \JsonSerializable, \Stringable
{
    /** @var array<string, mixed> */
    protected array $_attributes;

    /** @var array<string, bool|string> */
    protected array $defaultValues = [];

    /** @var array<string, string> */
    protected array $classMap = [];

    /** @var array<string, string> */
    protected array $collectionClassMap = [];

    /**
     * @var array<string, array{discriminator: string, mapping: array<string, string>}>
     */
    protected array $polymorphic = [];

    /**
     * @var array<string, array{discriminator: string, mapping: array<string, string>}>
     */
    protected array $polymorphicCollections = [];

    /**
     * @param array<string, mixed> $attributes
     */
    public function __construct(array $attributes = [])
    {
        $attributes = $this->mergeDefaultValues($attributes);

        $this->_attributes = $this->unserialize($attributes);
    }

    /**
     * @param mixed $value
     */
    public function __set(string $name, $value): void
    {
        $this->_attributes[$name] = $value;
    }

    /**
     * @phpstan-ignore missingType.return
     */
    public function &__get(string $name)
    {
        $attribute = null;

        if (\array_key_exists($name, $this->_attributes)) {
            $attribute = &$this->_attributes[$name];
        }

        return $attribute;
    }

    public function __unset(string $name): void
    {
        unset($this->_attributes[$name]);
    }

    public function __isset(string $name): bool
    {
        return isset($this->_attributes[$name]);
    }

    /**
     * @return array<string, mixed>
     */
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

    public function toJson(): string
    {
        return json_encode($this->_attributes, JSON_THROW_ON_ERROR);
    }

    public function __toString(): string
    {
        return $this->toJson() ?: '';
    }

    /**
     * @param array<string, mixed> $attributes
     *
     * @return array<string, mixed>
     */
    private function mergeDefaultValues(array $attributes): array
    {
        $diff = array_diff_key($this->defaultValues, $attributes);

        return array_merge($attributes, $diff);
    }

    /**
     * @param array<string, mixed> $attributes
     *
     * @return array<string, mixed>
     */
    private function unserialize(array $attributes): array
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
