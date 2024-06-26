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

namespace AlexApi\Component\Ddd\Site\Dispatcher;

use Joomla\CMS\Dispatcher\ComponentDispatcher;
use Joomla\CMS\Log\Log;
use Throwable;

use function strtolower;

defined('_JEXEC') || die;

final class Dispatcher extends ComponentDispatcher
{
    public function dispatch()
    {
        try {
            parent::dispatch();
        } catch (Throwable $e) {
            Log::add(
                sprintf('%s %s %d', $e->getMessage(), $e->getFile(), $e->getLine()),
                Log::ERROR,
                sprintf(
                    '%s.%s',
                    $this->option,
                    strtolower(
                        (string) $this->app->getName()
                    )
                )
            );
        }
    }

}
