<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property \AboutYou\Cloud\AdminApi\Models\Cursor $cursor
 */
class ApiCollection extends ApiObject
{
    protected $classMap = [
        'cursor' => \AboutYou\Cloud\AdminApi\Models\Cursor::class,
    ];

    /**
     * @return null|\AboutYou\Cloud\AdminApi\Models\Cursor
     */
    public function getCursor()
    {
        return $this->cursor;
    }
}
