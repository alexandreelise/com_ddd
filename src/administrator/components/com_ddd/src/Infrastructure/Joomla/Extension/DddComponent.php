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

namespace AlexApi\Component\Ddd\Administrator\Extension;

defined('JPATH_PLATFORM') or die;

use Joomla\CMS\Extension\BootableExtensionInterface;
use Joomla\CMS\Extension\MVCComponent;
use Psr\Container\ContainerInterface;

/**
 * Component class for com_ddd
 *
 * @since  0.1.0
 */
class DddComponent
    extends MVCComponent
    implements BootableExtensionInterface

{

    /**
     * DI Container specific to this component which can be accessed by calling getSpecificContainer getter
     *
     * @var ContainerInterface|null $componentSpecificDIContainer
     */
    private ContainerInterface|null $componentSpecificDIContainer = null;

    /**
     * Booting the extension. This is the function to set up the environment of the extension like
     * registering new class loaders, etc.
     *
     * If required, some initial set up can be done from services of the container, eg.
     * registering HTML services.
     *
     * @param ContainerInterface $container The container
     *
     * @return  void
     *
     * @since   0.1.0
     */
    public function boot(ContainerInterface $container)
    {
        $this->componentSpecificDIContainer = $container;
    }

    /**
     * Get DI Container specific to this component which holds any dependencies of this component.
     * Might be faster than calling global DI Container in some cases
     *
     * @return ContainerInterface|null
     */
    public function getSpecificContainer(): ContainerInterface|null
    {
        return $this->componentSpecificDIContainer;
    }
}
