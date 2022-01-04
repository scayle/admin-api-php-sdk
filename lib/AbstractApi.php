<?php

namespace AboutYou\Cloud\AdminApi;

use AboutYou\Cloud\AdminApi\Exceptions\InvalidArgumentException;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\ResponseInterface;

abstract class AbstractApi
{
    const API_URL = 'apiUrl';
    const ACCESS_TOKEN = 'accessToken';
    const AUTH_HEADER_NAME = 'X-Access-Token';

    /**
     * @var ClientInterface
     */
    private $httpClient;

    /**
     * @var array<string, string>
     */
    private $config;

    /**
     * AbstractAdminApi constructor.
     *
     * @param array<string, string> $config
     *
     * @example ['apiUrl' => 'http://cloud.aboutyou.com', 'accessToken' => 'myToken']
     *
     * @param ClientInterface $httpClient
     */
    public function __construct($config = [], $httpClient = null)
    {
        $this->validateConfig($config);

        $this->config = $config;
        $this->httpClient = $httpClient ?: new Client();
    }

    /**
     * @return string
     */
    public function getApiUrl()
    {
        return $this->config[self::API_URL];
    }

    /**
     * @return string
     */
    public function getAccessToken()
    {
        return $this->config[self::ACCESS_TOKEN];
    }

    /**
     * @param string $method
     * @param string $relativePath
     * @param array $query
     * @param array $headers
     * @param null|string $body
     *
     * @throws ClientExceptionInterface
     *
     * @return ResponseInterface
     */
    public function request($method, $relativePath, $query = [], $headers = [], $body = null)
    {
        $url = $this->getApiUrl() . $relativePath . $this->makeQueryString($query);
        $headers = $this->makeHeaders($headers, null !== $body);
        $request = new Request($method, $url, $headers, $body);

        return $this->httpClient->sendRequest($request);
    }

    /**
     * @param array $headers
     * @param bool $withContentType
     *
     * @return array
     */
    private function makeHeaders($headers, $withContentType)
    {
        $headers[self::AUTH_HEADER_NAME] = $this->getAccessToken();
        $headers['Accept'] = 'application/json, */*';

        if ($withContentType) {
            $headers['Content-Type'] = 'application/json';
        }

        return \array_filter($headers);
    }

    /**
     * @param array $query
     *
     * @return string
     */
    private function makeQueryString($query)
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

        return '?' . \http_build_query($query);
    }

    /**
     * @param array<string, string> $config
     *
     * @throws InvalidArgumentException
     */
    private function validateConfig($config)
    {
        if (empty($config[self::API_URL])) {
            $message = \sprintf('%s cannot be empty', self::API_URL);

            throw new InvalidArgumentException($message);
        }

        if (empty($config[self::ACCESS_TOKEN])) {
            $message = \sprintf('%s cannot be empty', self::ACCESS_TOKEN);

            throw new InvalidArgumentException($message);
        }
    }
}
