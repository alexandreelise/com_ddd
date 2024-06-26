<?php

declare(strict_types=1);

/**
 * @package    Ddd
 *
 * @author     Mr Alexandre J-S William ELISÉ <code@apiadept.com>
 * @copyright  Copyright (c) 2009 - present. https://apiadept.com. All rights reserved
 * @license    AGPL-3.0-or-later
 * @link       https://apiadept.com
 */

use Joomla\CMS\Application\AdministratorApplication;
use Joomla\CMS\Installer\InstallerScript;
use Joomla\CMS\Installer\InstallerScriptInterface;
use Joomla\DI\Container;
use Joomla\DI\ServiceProviderInterface;

defined('_JEXEC') or die;

return new class () implements ServiceProviderInterface {
    public function register(Container $container)
    {
        $container->set(
            InstallerScriptInterface::class,
            new class ($container->get(AdministratorApplication::class))
                extends InstallerScript
                implements InstallerScriptInterface {
                /**
                 * Minimum PHP version to check
                 *
                 * @var    string
                 * @since  0.1.0
                 */
                protected $minimumPhp = '8.1.0';

                /**
                 * Minimum Joomla version to check
                 *
                 * @var    string
                 * @since  0.1.0
                 */
                protected $minimumJoomla = '4.0.0';

                public function __construct(private readonly AdministratorApplication $app)
                {
                }

                public function preflight($type, $parent): bool
                {
                    $outcome = parent::preflight($type, $parent);
                    if (!$outcome) {
                        return false;
                    }

                    $this->app->enqueueMessage(
                        sprintf('%s %s version: %s', ucfirst((string) $type), $this->extension, $parent->getManifest()->version)
                    );

                    // Not called automatically
                    $this->removeFiles();

                    return true;
                }


                public function postflight($type, $parent): bool
                {
                    $this->app->enqueueMessage(
                        sprintf('%s %s version: %s', ucfirst((string) $type), $this->extension, $parent->getManifest()->version)
                    );

                    return true;
                }

                public function install($parent): bool
                {
                    $this->app->enqueueMessage(
                        sprintf('%s %s version: %s', 'Install', $this->extension, $parent->getManifest()->version)
                    );

                    return true;
                }

                public function update($parent): bool
                {
                    $this->app->enqueueMessage(
                        sprintf('%s %s version: %s', 'Update', $this->extension, $parent->getManifest()->version)
                    );

                    return true;
                }

                public function uninstall($parent): bool
                {
                    $this->app->enqueueMessage(
                        sprintf('%s %s version: %s', 'Uninstall', $this->extension, $parent->getManifest()->version)
                    );

                    return true;
                }
            }
        );
    }
};
