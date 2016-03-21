<?php

namespace Bolt\Extension\YourName\Stencil;

use Bolt\Events\ControllerEvents;
use Bolt\Extension\AuthorName\Stencil\Provider\StencilServiceProvider;
use Bolt\Extension\AuthorName\Stencil\Storage\Entity;
use Bolt\Extension\AuthorName\Stencil\Storage\Repository;
use Bolt\Extension\AuthorName\Stencil\Storage\Schema;
use Bolt\Extension\DatabaseSchemaTrait;
use Bolt\Extension\SimpleExtension;
use Bolt\Extension\StorageTrait;
use Pimple as Container;
use Silex\Application;
use Silex\ControllerCollection;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * Stencil extension class.
 *
 * NOTE: All of these functions are safe to remove if not being used to modify
 *       your extension's behaviour.
 *
 * @author Your Name <you@example.com>
 */
class StencilExtension extends SimpleExtension
{
    ///////////////////////////////////////////////////////////////////////////
    // Set up Functions
    ///////////////////////////////////////////////////////////////////////////

    /**
     * {@inheritdoc}
     */
    protected function registerServices(Application $app)
    {
    }

    /**
     * {@inheritdoc}
     */
    protected function subscribe(EventDispatcherInterface $dispatcher)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function getServiceProviders()
    {
        return [
            $this,
            new StencilServiceProvider($this->getConfig()),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function boot(Application $app)
    {
        $this->container = $app;
        $this->container['dispatcher']->addSubscriber($this);
        $this->subscribe($this->container['dispatcher']);
    }

    /**
     * {@inheritdoc}
     */
    public static function getSubscribedEvents()
    {
        return [
            ControllerEvents::MOUNT => [
                ['onMountRoutes', 0],
                ['onMountControllers', 0],
            ],
        ];
    }

    ///////////////////////////////////////////////////////////////////////////
    // Asset Functions.
    ///////////////////////////////////////////////////////////////////////////

    /**
     * {@inheritdoc}
     */
    protected function registerAssets()
    {
        return [];
    }

    ///////////////////////////////////////////////////////////////////////////
    // Configuration Functions.
    ///////////////////////////////////////////////////////////////////////////

    /**
     * {@inheritdoc}
     */
    protected function getDefaultConfig()
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    protected function registerFields()
    {
        return [];
    }

    ///////////////////////////////////////////////////////////////////////////
    // Controller Functions.
    ///////////////////////////////////////////////////////////////////////////

    /**
     * {@inheritdoc}
     */
    protected function registerFrontendControllers()
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    protected function registerBackendControllers()
    {
        return [];
    }

    ///////////////////////////////////////////////////////////////////////////
    // Route Functions.
    ///////////////////////////////////////////////////////////////////////////

    /**
     * {@inheritdoc}
     */
    protected function registerFrontendRoutes(ControllerCollection $collection)
    {
    }

    /**
     * {@inheritdoc}
     */
    protected function registerBackendRoutes(ControllerCollection $collection)
    {
    }

    ///////////////////////////////////////////////////////////////////////////
    // Extension Database Functions.
    ///////////////////////////////////////////////////////////////////////////

    use DatabaseSchemaTrait;

    /**
     * {@inheritdoc}
     */
    protected function registerExtensionTables()
    {
        return [
            'stencil' => Schema\Table\Stencil::class,
        ];
    }

    ///////////////////////////////////////////////////////////////////////////
    // Extension Storage Functions.
    ///////////////////////////////////////////////////////////////////////////

    use StorageTrait;

    /**
     * {@inheritdoc}
     */
    protected function registerRepositoryMappings()
    {
        return [
            'stencil' => [Entity\Stencil::class => Repository\Stencil::class],
        ];
    }

    ///////////////////////////////////////////////////////////////////////////
    // Extension Menu Functions.
    ///////////////////////////////////////////////////////////////////////////

    /**
     * {@inheritdoc}
     */
    protected function registerMenuEntries()
    {
        return [];
    }

    ///////////////////////////////////////////////////////////////////////////
    // Nut Command Functions.
    ///////////////////////////////////////////////////////////////////////////

    /**
     * {@inheritdoc}
     */
    protected function registerNutCommands(Container $container)
    {
        return [];
    }

    ///////////////////////////////////////////////////////////////////////////
    // Twig Functions.
    ///////////////////////////////////////////////////////////////////////////

    /**
     * {@inheritdoc}
     */
    protected function registerTwigFunctions()
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    protected function registerTwigFilters()
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    protected function registerTwigPaths()
    {
        return [];
    }
}
