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

namespace Scayle\Cloud\AdminApi\Exceptions;

class ApiError implements \JsonSerializable
{
    /**
     * @param array<mixed> $context
     */
    public function __construct(
        private string $errorKey = '',
        private string $message = '',
        private array $context = []
    ) {}

    public function getErrorKey(): string
    {
        return $this->errorKey;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @return array<mixed>
     */
    public function getContext(): array
    {
        return $this->context;
    }

    /**
     * @return array{errorKey: string, message: string, context: array<mixed>}
     */
    public function jsonSerialize(): array
    {
        return [
            'errorKey' => $this->errorKey,
            'message' => $this->message,
            'context' => $this->context,
        ];
    }
}
