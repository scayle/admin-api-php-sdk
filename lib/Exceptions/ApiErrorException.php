<?php

namespace AboutYou\Cloud\AdminApi\Exceptions;

class ApiErrorException extends \Exception
{
    /**
     * @var ApiError[]
     */
    private $errors = [];

    /**
     * @var int
     */
    private $statusCode;

    /**
     * @param array $errorResponse
     * @param int $statusCode
     */
    public function __construct($errorResponse, $statusCode)
    {
        $this->errors = $this->parseErrors($errorResponse);
        $this->statusCode = $statusCode;
        parent::__construct('Errors occurred while handling the API request ', $statusCode);
    }

    /**
     * @return null|ApiError
     */
    public function getFirstError()
    {
        return empty($this->errors) ? null : $this->errors[0];
    }

    /**
     * @return ApiError[]
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * @return int
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @param array $errorResponse
     *
     * @return ApiError[]
     */
    private function parseErrors($errorResponse)
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
