<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property array $entities
 */
class ArrayCollection extends ApiCollection
{
    /**
     * @return array
     */
    public function getEntities()
    {
        return $this->entities;
    }
}
