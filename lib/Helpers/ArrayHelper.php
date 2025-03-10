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

namespace Scayle\Cloud\AdminApi\Helpers;

class ArrayHelper
{
    /**
     * @param array<mixed> $array
     * @param string[] $keys
     *
     * @return array<mixed>
     */
    public static function except(array $array, array $keys): array
    {
        return array_diff_key($array, array_flip($keys));
    }

    /**
     * @param array<mixed> $array
     *
     * @return null|mixed
     */
    public static function get(array $array, string $key)
    {
        return $array[$key] ?? null;
    }
}
