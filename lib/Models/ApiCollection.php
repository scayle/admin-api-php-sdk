<?php

namespace AboutYou\Cloud\AdminApi\Models;

/**
 * @property Cursor $cursor
 */
class ApiCollection extends ApiObject
{
    protected $classMap = [
        'cursor' => Cursor::class,
    ];

    /**
     * @return null|Cursor
     */
    public function getCursor()
    {
        return $this->cursor;
    }
}
