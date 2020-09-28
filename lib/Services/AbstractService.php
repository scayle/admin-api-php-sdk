<?php

namespace AboutYou\Cloud\AdminApi\Services;

use AboutYou\Cloud\AdminApi\AbstractApi;
use AboutYou\Cloud\AdminApi\Exceptions\ApiErrorException;
use AboutYou\Cloud\AdminApi\Models\ApiObject;
use Psr\Http\Client\ClientExceptionInterface;

abstract class AbstractService
{
    /**
     * @var AbstractApi
     */
    private $client;

    /**
     * @param AbstractApi $client
     */
    public function __construct($client)
    {
        $this->client = $client;
    }

    /**
     * @param string $method the http method
     * @param string $relativeUrl the relative url of endpoint
     * @param string|null $modelClass the classname of which the response gets transformed to
     * @param array<string, string> $options array of additional options
     * @param ApiObject|null $body the request body object
     *
     * @return mixed|null
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    protected function request($method, $relativeUrl, $options = [], $modelClass = null, $body = null)
    {
        try {
            if ($body instanceof ApiObject) {
                $body = $body->toJson();
            } else {
                $body = json_encode($body);
            }

            $response = $this->client->request($method, $relativeUrl, $options, $body);
            $statusCode = $response->getStatusCode();

            $responseBody = $response->getBody()->getContents();
            // Catching all NON 2xx status codes for further error processing
            if ($statusCode < 200 || $statusCode >= 300) {
                $responseJson = json_decode($responseBody, true);
                throw new ApiErrorException($responseJson, $statusCode);
            }

            if ($responseBody && $modelClass && class_exists($modelClass)) {
                $responseJson = json_decode($responseBody, true);
                return new $modelClass($responseJson);
            } else {
                return json_decode($responseBody, true);
            }
        } catch (ClientExceptionInterface $e) {
            throw $e;
        }
    }

    /**
     * @param string $path
     * @param mixed ...$params
     *
     * @return string
     */
    protected function resolvePath($path, ...$params)
    {
        return vsprintf($path, $params);
    }
}