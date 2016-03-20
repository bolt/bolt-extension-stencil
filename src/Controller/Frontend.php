<?php

namespace Bolt\Extension\AuthorName\Stencil\Controller;

use Bolt\Extension\AuthorName\Blank\Config;
use Silex\Application;
use Silex\ControllerCollection;
use Silex\ControllerProviderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Front-end controller class.
 *
 * @author Your Name <you@example.com>
 */
class Frontend implements ControllerProviderInterface
{
    /** @var Config */
    private $config;

    /**
     * Constructor.
     *
     * @param Config $config
     */
    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    /**
     * {@inheritdoc}
     */
    public function connect(Application $app)
    {
        /** @var $ctr ControllerCollection */
        $ctr = $app['controllers_factory'];

        $ctr->match('/', [$this, 'stencil'])
            ->bind('stencilRoot')
            ->method('GET|POST')
        ;

        $ctr->after([$this, 'after']);

        return $ctr;
    }

    /**
     * Middleware to modify the Response before the controller is executed.
     *
     * @param Request     $request
     * @param Application $app
     */
    public function before(Request $request, Application $app)
    {
    }

    /**
     * Middleware to modify the Response before it is sent to the client.
     *
     * @param Request     $request
     * @param Response    $response
     * @param Application $app
     */
    public function after(Request $request, Response $response, Application $app)
    {
    }

    /**
     * Default route.
     *
     * @param Application $app
     * @param Request     $request
     *
     * @return Response
     */
    public function stencil(Application $app, Request $request)
    {
        return new Response('');
    }
}
