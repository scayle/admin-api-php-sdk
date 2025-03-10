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

/**
 * @property Customer[] $entities
 */
class CustomerCollection extends ApiCollection
{
    /** @var array<string, string> */
    protected array $collectionClassMap = [
        'entities' => Customer::class,
    ];

    /**
     * @return Customer[]
     */
    public function getEntities(): array
    {
        return $this->entities;
    }
}
