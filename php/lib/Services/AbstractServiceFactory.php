<?php

namespace AboutYou\Cloud\AdminApi\Services;

use AboutYou\Cloud\AdminApi\AbstractApi;

abstract class AbstractServiceFactory
{
    /**
     * @var array<string, string>
     */
    protected $classMap = [];

    /**
     * @var array<string, AbstractService>
     */
    private $services;

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
        $this->services = [];
    }

    public function get($name)
    {
        if (!\array_key_exists($name, $this->services)) {
            $this->services[$name] = new $this->classMap[$name]($this->client);
        }

        return $this->services[$name];
    }
}
