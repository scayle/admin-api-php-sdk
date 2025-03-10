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

class ApiErrorException extends \Exception
{
    /** @var ApiError[] */
    private array $errors;

    /**
     * @param array<array{errorKey: string, message: string, context: array<mixed>}> $errorResponse
     */
    public function __construct(array $errorResponse, private int $statusCode)
    {
        $this->errors = $this->parseErrors($errorResponse);

        parent::__construct('Errors occurred while handling the API request ', $statusCode);
    }

    public function getFirstError(): ?ApiError
    {
        return empty($this->errors) ? null : $this->errors[0];
    }

    /**
     * @return ApiError[]
     */
    public function getErrors(): array
    {
        return $this->errors;
    }

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    /**
     * @param array{errors?: array{errorKey: string, message: string, context: array<mixed>}} $errorResponse
     *
     * @return ApiError[]
     */
    private function parseErrors($errorResponse): array
    {
        $adminApiErrors = [];

        if (!isset($errorResponse['errors'])) {
            return $adminApiErrors;
        }

        foreach ($errorResponse['errors'] as $error) {
            $adminApiErrors[] = new ApiError($error['errorKey'], $error['message'], $error['context']);
        }

        return $adminApiErrors;
    }
}
