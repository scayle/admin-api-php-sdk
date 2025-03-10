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

use Psr\Http\Client\ClientExceptionInterface;
use Scayle\Cloud\AdminApi\AbstractApi;
use Scayle\Cloud\AdminApi\Exceptions\ApiErrorException;
use Scayle\Cloud\AdminApi\Models\ApiObject;

abstract class AbstractService
{
    public function __construct(private AbstractApi $client) {}

    /**
     * @param string $method the http method
     * @param string $relativeUrl the relative url of endpoint
     * @param null|string $modelClass the classname of which the response gets transformed to
     * @param array<string, mixed> $query array of additional query parameters
     * @param array<string, mixed> $headers array of additional headers
     * @param null|ApiObject|array<mixed>|string $body the request body object
     *
     * @return null|mixed
     *
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     */
    protected function request(
        string $method,
        string $relativeUrl,
        array $query = [],
        array $headers = [],
        ?string $modelClass = null,
        $body = null
    ) {
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
     * @param mixed ...$params
     */
    protected function resolvePath(string $path, ...$params): string
    {
        return vsprintf($path, $params);
    }
}
