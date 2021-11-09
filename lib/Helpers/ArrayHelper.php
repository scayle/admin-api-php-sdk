<?php

namespace AboutYou\Cloud\AdminApi\Helpers;

class ArrayHelper
{
    /**
     * @param array $array
     * @param string[] $keys
     *
     * @return array
     */
    public static function except($array, $keys)
    {
        return \array_diff_key($array, \array_flip($keys));
    }

    /**
     * @param array $array
     * @param string $key
     *
     * @return null|mixed
     */
    public static function get($array, $key)
    {
        return isset($array[$key]) ? $array[$key] : null;
    }
}
