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

namespace Scayle\Cloud\AdminApi;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\ResponseInterface;
use Scayle\Cloud\AdminApi\Exceptions\InvalidArgumentException;

abstract class AbstractApi
{
    public const API_URL = 'apiUrl';
    public const ACCESS_TOKEN = 'accessToken';
    public const AUTH_HEADER_NAME = 'X-Access-Token';
    public const SDK_VERSION = 'X-SDK-Version';

    private ClientInterface $httpClient;

    /**
     * @param array{apiUrl: string, accessToken: string} $config ['apiUrl' => 'http://scayle.cloud', 'accessToken' => 'myToken']
     */
    public function __construct(private array $config, ?ClientInterface $httpClient = null)
    {
        $this->validateConfig($config);

        $this->httpClient = $httpClient ?: new Client();
    }

    public function getApiUrl(): string
    {
        return $this->config[self::API_URL];
    }

    public function getAccessToken(): string
    {
        return $this->config[self::ACCESS_TOKEN];
    }

    /**
     * @param array<string, bool|int|string> $query
     * @param array<string, string> $headers
     *
     * @throws ClientExceptionInterface
     */
    public function request(
        string $method,
        string $relativePath,
        array $query = [],
        array $headers = [],
        ?string $body = null
    ): ResponseInterface {
        $url = $this->getApiUrl() . $relativePath . $this->makeQueryString($query);
        $headers = $this->makeHeaders($headers, null !== $body);
        $request = new Request($method, $url, $headers, $body);

        return $this->httpClient->sendRequest($request);
    }

    /**
     * @param array<string, string> $headers
     *
     * @return array<string, string>
     */
    private function makeHeaders(array $headers, bool $withContentType)
    {
        $headers[self::AUTH_HEADER_NAME] = $this->getAccessToken();
        $headers[self::SDK_VERSION] = 'v2.14.0';
        $headers['Accept'] = 'application/json, */*';

        if ($withContentType) {
            $headers['Content-Type'] = 'application/json';
        }

        return array_filter($headers);
    }

    /**
     * @param array<string, bool|int|string> $query
     */
    private function makeQueryString(array $query): string
    {
        if (empty($query)) {
            return '';
        }

        foreach ($query as &$value) {
            if (\is_bool($value)) {
                $value = $value ? 'true' : 'false';
            }
        }

        unset($value);

        return '?' . http_build_query($query);
    }

    /**
     * @param array{apiUrl: string, accessToken: string} $config
     *
     * @throws InvalidArgumentException
     */
    private function validateConfig($config): void
    {
        if (empty($config[self::API_URL])) {
            throw new InvalidArgumentException(\sprintf('%s cannot be empty', self::API_URL));
        }

        if (empty($config[self::ACCESS_TOKEN])) {
            throw new InvalidArgumentException(\sprintf('%s cannot be empty', self::ACCESS_TOKEN));
        }
    }
}
