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

namespace Scayle\Cloud\AdminApi\Services;

use Scayle\Cloud\AdminApi\AbstractApi;

abstract class AbstractServiceFactory
{
    /** @var array<string, string> */
    protected array $classMap = [];

    /**
     *  @param array<string, AbstractService> $services
     */
    public function __construct(private AbstractApi $client, private array $services = []) {}

    /**
     * @phpstan-ignore missingType.return
     */
    public function get(string $name)
    {
        if (!\array_key_exists($name, $this->services)) {
            $this->services[$name] = new $this->classMap[$name]($this->client);
        }

        return $this->services[$name];
    }
}
