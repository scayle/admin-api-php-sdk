<?php

namespace AboutYou\Cloud\AdminApi\Exceptions;

class ApiError implements \JsonSerializable
{
    /**
     * @var string
     */
    private $errorKey;

    /**
     * @var string
     */
    private $message;

    /**
     * @var array
     */
    private $context;

    public function __construct($errorKey, $message, $context)
    {
        $this->errorKey = $errorKey;
        $this->message = $message;
        $this->context = $context;
    }

    /**
     * @return string
     */
    public function getErrorKey()
    {
        return $this->errorKey;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @return array
     */
    public function getContext()
    {
        return $this->context;
    }

    public function jsonSerialize(): array
    {
        return [
            'errorKey' => $this->errorKey,
            'message' => $this->message,
            'context' => $this->context,
        ];
    }
}
