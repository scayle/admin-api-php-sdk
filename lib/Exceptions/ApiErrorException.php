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
     * @param array $responseErrors
     * @param int $statusCode
     */
    public function __construct($responseErrors, $statusCode)
    {
        $this->errors = $this->parseErrors($responseErrors);
        $this->statusCode = $statusCode;
        parent::__construct('Errors occured while handling the API request ', $statusCode);
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
     * @param array $errors
     *
     * @return ApiError[]
     */
    private function parseErrors($errors)
    {
        $adminApiErrors = [];

        foreach ($errors['errors'] as $error) {
            $adminApiErrors[] = new ApiError($error['errorKey'], $error['message'], $error['context']);
        }

        return $adminApiErrors;
    }
}
