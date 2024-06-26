<?php

declare(strict_types=1);
/**
 * Ddd
 *
 * @package    Ddd
 *
 * @author     Mr Alexandre J-S William ELISÉ <code@apiadept.com>
 * @copyright  Copyright (c) 2009 - present. https://apiadept.com. All rights reserved
 * @license    AGPL-3.0-or-later
 * @link       https://apiadept.com
 */

defined('_JEXEC') or die;

use AlexApi\Component\Ddd\Administrator\ServiceProvider\DomainServiceProvider;
use Joomla\CMS\Dispatcher\ComponentDispatcherFactoryInterface;
use Joomla\CMS\Extension\ComponentInterface;
use Joomla\CMS\Extension\Service\Provider\ComponentDispatcherFactory;
use Joomla\CMS\Extension\Service\Provider\MVCFactory;
use Joomla\CMS\MVC\Factory\MVCFactoryInterface;
use Joomla\DI\Container;
use Joomla\DI\ServiceProviderInterface;
use AlexApi\Component\Ddd\Administrator\Extension\DddComponent;

/**
 * The ddd service provider.
 * https://github.com/joomla/joomla-cms/pull/20217
 *
 * @since  0.1.0
 */
return new class implements ServiceProviderInterface {
    /**
     * Registers the service provider with a DI container.
     *
     * @param   Container  $container  The DI container.
     *
     * @return  void
     *
     * @since   0.1.0
     */
    public function register(Container $container)
    {
        // Load Domain Layer
        $container->registerServiceProvider(
            new DomainServiceProvider('\\AlexApi\\Domain\\Ddd\\')
        );

        // Load Application Layer
        $container->registerServiceProvider(
            new DomainServiceProvider('\\AlexApi\\Application\\Ddd\\')
        );

        $container->registerServiceProvider(
            new MVCFactory('\\AlexApi\\Component\\Ddd')
        );
        $container->registerServiceProvider(
            new ComponentDispatcherFactory('\\AlexApi\\Component\\Ddd')
        );

        $container->set(
            ComponentInterface::class,
            function (Container $innerContainer) {
                $component = new DddComponent(
                    $innerContainer->get(ComponentDispatcherFactoryInterface::class)
                );

                $component->setMVCFactory($innerContainer->get(MVCFactoryInterface::class));

                return $component;
            }
        );
    }
};
