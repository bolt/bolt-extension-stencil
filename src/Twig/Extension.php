<?php

namespace Bolt\Extension\AuthorName\Blank;

use Twig_Environment as TwigEnvironment;
use Twig_Extension as TwigExtension;
use Twig_Markup as TwigMarkup;
use Twig_SimpleFilter as TwigSimpleFilter;
use Twig_SimpleFunction as TwigSimpleFunction;

/**
 * Configuration class.
 *
 * @author Your Name <you@example.com>
 */
class Extension extends TwigExtension
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
    public function getName()
    {
        return 'Members';
    }

    /**
     * {@inheritdoc}
     */
    public function getFunctions()
    {
        $safe = ['is_safe' => ['html'], 'is_safe_callback' => true];
        $env  = ['needs_environment' => true];

        return [
            new TwigSimpleFunction('', [$this, 'stencilFunc']),
            new TwigSimpleFunction('', [$this, 'stencilEnvFunc'], $safe + $env),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getFilters()
    {
        $safe = ['is_safe' => ['html'], 'is_safe_callback' => true];
        $env  = ['needs_environment' => true];

        return [
            new TwigSimpleFilter('', [$this, 'stencilFilter']),
        ];
    }

    /**
     * Simple Twig function.
     *
     * @return TwigMarkup
     */
    public function stencilFunc()
    {
        $html = '';

        return new TwigMarkup($html, 'UTF-8');
    }

    /**
     * Rendered Twig function.
     *
     * @return TwigMarkup
     */
    public function stencilEnv(TwigEnvironment $env)
    {
        $context = ['var' => 'value'];
        $html = $env->render('extension.twig', $context);

        return new TwigMarkup($html, 'UTF-8');
    }

    /**
     * Simple Twig Filter.
     * 
     * @param string $input
     *
     * @return string
     */
    public function stencilFilter($input)
    {
        return ucwords($input);
    }
}
