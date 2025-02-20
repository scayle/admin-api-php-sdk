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
     * @param null|string $modelClass the classname of which the response gets transformed to
     * @param array $query array of additional query parameters
     * @param array $headers array of additional headers
     * @param null|ApiObject|string $body the request body object
     *
     * @return null|mixed
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    protected function request($method, $relativeUrl, $query = [], $headers = [], $modelClass = null, $body = null)
    {
        try {
            if ($body instanceof ApiObject) {
                $body = $body->toJson();
            } elseif (null !== $body) {
                $body = json_encode($body);
            }

            $response = $this->client->request($method, $relativeUrl, $query, $headers, $body);
            $contentType = $response->getHeaderLine('Content-Type');
            $statusCode = $response->getStatusCode();

            $responseBody = (string) $response->getBody();

            // Catching all NON 2xx status codes for further error processing
            if ($statusCode < 200 || $statusCode >= 300) {
                $responseJson = json_decode($responseBody, true);

                throw new ApiErrorException(null === $responseJson ? [] : $responseJson, $statusCode);
            }

            if (str_contains($contentType, 'application/pdf')) {
                return $response->getBody()->getContents();
            }

            if ($responseBody && $modelClass && class_exists($modelClass)) {
                $responseJson = json_decode($responseBody, true);

                return new $modelClass($responseJson);
            }

            return json_decode($responseBody, true);
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
