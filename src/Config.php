<?php

namespace Bolt\Extension\AuthorName\Blank;

/**
 * Configuration class.
 *
 * @author Your Name <you@example.com>
 */
class Config
{
    /** @var array */
    private $config;

    /**
     * Constructor.
     *
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->config = $config;
    }

    /**
     * @return array
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * @param array $config
     *
     * @return Config
     */
    public function setConfig($config)
    {
        $this->config = $config;

        return $this;
    }
}
