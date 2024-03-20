<?php
/**
 * Jingga
 *
 * PHP Version 8.2
 *
 * @package   Modules\Marketing
 * @copyright Dennis Eichhorn
 * @license   OMS License 2.0
 * @version   1.0.0
 * @link      https://jingga.app
 */
declare(strict_types=1);

namespace Modules\Marketing\Controller;

use phpOMS\Module\ModuleAbstract;

/**
 * Marketing controller class.
 *
 * @package Modules\Marketing
 * @license OMS License 2.0
 * @link    https://jingga.app
 * @since   1.0.0
 */
class Controller extends ModuleAbstract
{
    /**
     * Module path.
     *
     * @var string
     * @since 1.0.0
     */
    public const PATH = __DIR__ . '/../';

    /**
     * Module version.
     *
     * @var string
     * @since 1.0.0
     */
    public const VERSION = '1.0.0';

    /**
     * Module name.
     *
     * @var string
     * @since 1.0.0
     */
    public const NAME = 'Marketing';

    /**
     * Module id.
     *
     * @var int
     * @since 1.0.0
     */
    public const ID = 1001900000;

    /**
     * List of modules this module provides for.
     *
     * @var string[]
     * @since 1.0.0
     */
    public static array $providing = [];

    /**
     * List of modules this module depends on.
     *
     * @var string[]
     * @since 1.0.0
     */
    public static array $dependencies = [];
}
