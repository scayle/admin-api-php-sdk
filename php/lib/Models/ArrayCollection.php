<?php

namespace AboutYou\Cloud\AdminApi\Models;

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
