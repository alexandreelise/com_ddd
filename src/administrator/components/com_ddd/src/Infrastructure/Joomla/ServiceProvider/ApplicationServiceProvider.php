<?php

declare(strict_types=1);
/**
 * @copyright (c) 2009 - present. Mr Alexandre J-S William ELISÉ. All rights reserved.
 * @license       GNU Affero General Public License v3.0 or later (AGPL-3.0-or-later). See LICENSE.txt file
 */

namespace AlexApi\Component\Ddd\Administrator\ServiceProvider;

use JLoader;
use Joomla\DI\Container;
use Joomla\DI\ServiceProviderInterface;

use function defined;

use const JPATH_ADMINISTRATOR;

// phpcs:disable PSR1.Files.SideEffects
defined('_JEXEC') or die;

// phpcs:enable PSR1.Files.SideEffects

final class ApplicationServiceProvider implements ServiceProviderInterface
{
    public function __construct(private readonly string $namespace)
    {
    }

    /**
     * @inheritDoc
     */
    public function register(Container $container)
    {
        $path = JPATH_ADMINISTRATOR . '/components/com_ddd/src/Application';
        // Prevent loading unreachable path
        if (!is_dir($path)) {
            return;
        }

        // Add custom namespace to Joomla autoloader
        JLoader::registerNamespace($this->namespace, $path);
    }
}
