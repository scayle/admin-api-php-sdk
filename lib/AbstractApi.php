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
    const VERSION = '1.0.0';

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
     * @param array<string, string> $options
     * @param null|string $body
     *
     * @throws ClientExceptionInterface
     *
     * @return ResponseInterface
     */
    public function request($method, $relativePath, $options = [], $body = null)
    {
        $url = $this->getApiUrl() . $relativePath . $this->makeQueryString($options);

        $headers = $this->getAuthHeader();
        $headers['Accept'] = 'application/json, */*';
        $headers['X-SDK'] = 'php/' . self::VERSION;

        if (null !== $body) {
            $headers['Content-Type'] = 'application/json';
        }

        $request = new Request($method, $url, $headers, $body);

        return $this->httpClient->sendRequest($request);
    }

    private function getAuthHeader()
    {
        return [
            self::AUTH_HEADER_NAME => $this->getAccessToken(),
        ];
    }

    private function makeQueryString(array $options): string
    {
        if (empty($options)) {
            return '';
        }

        foreach ($options as &$value) {
            if (\is_bool($value)) {
                $value = $value ? 'true' : 'false';
            }
        }

        unset($value);

        return '?' . \http_build_query($options);
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
