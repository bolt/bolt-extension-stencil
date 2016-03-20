<?php

namespace Bolt\Extension\AuthorName\Stencil\Provider;

use Bolt\Extension\AuthorName\Stencil\Storage\Entity;
use Bolt\Extension\AuthorName\Stencil\Storage\Repository;
use Bolt\Extension\AuthorName\Stencil\Storage\Schema;
use Pimple as Container;
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
        $app['stencil.schema.table'] = $app->share(
            function () use ($app) {
                /** @var \Doctrine\DBAL\Platforms\AbstractPlatform $platform */
                $platform = $app['db']->getDatabasePlatform();
                $prefix = $app['schema.prefix'];

                return new Container([
                    'stencil' => $app->share(
                        function () use ($platform, $prefix) {
                            return new Schema\Table\Stencil($platform, $prefix);
                        }
                    ),
                ]);
            }
        );

        $mapping = [
            'stencil' => [Entity\Stencil::class => Repository\Stencil::class],
        ];

        foreach ($mapping as $alias => $map) {
            $app['storage.repositories'] += $map;
            $app['storage.metadata']->setDefaultAlias($app['schema.prefix'] . $alias, key($map));
            $app['storage']->setRepository(key($map), current($map));
        }
    }

    /**
     * {@inheritdoc}
     */
    public function boot(Application $app)
    {
    }
}
