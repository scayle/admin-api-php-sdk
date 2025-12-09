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

class Identifier
{
    private function __construct(private string $identifier) {}

    public static function fromId(int $id): self
    {
        return new self((string) $id);
    }

    public static function fromKey(string $referenceKey): self
    {
        return new self(urlencode('key=' . $referenceKey));
    }

    public function __toString(): string
    {
        return $this->identifier;
    }
}
