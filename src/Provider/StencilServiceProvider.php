<?php

namespace Bolt\Extension\AuthorName\Stencil\Provider;

use Silex\Application;
use Silex\ServiceProviderInterface;

/**
 * Stencil service provider.
 *
 * @author Your Name <you@example.com>
 */
class StencilServiceProvider implements ServiceProviderInterface
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
     * {@inheritdoc}
     */
    public function register(Application $app)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function boot(Application $app)
    {
    }
}
