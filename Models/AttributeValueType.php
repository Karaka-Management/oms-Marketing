<?php
/**
 * Jingga
 *
 * PHP Version 8.2
 *
 * @package   Modules\Marketing\Models
 * @copyright Dennis Eichhorn
 * @license   OMS License 2.0
 * @version   1.0.0
 * @link      https://jingga.app
 */
declare(strict_types=1);

namespace Modules\Marketing\Models;

use phpOMS\Stdlib\Base\Enum;

/**
 * Attribute value type enum.
 *
 * @package Modules\Marketing\Models
 * @license OMS License 2.0
 * @link    https://jingga.app
 * @since   1.0.0
 */
abstract class AttributeValueType extends Enum
{
    public const _INT = 1;

    public const _STRING = 2;

    public const _FLOAT = 3;

    public const _DATETIME = 4;

    public const _BOOL = 5;

    public const _FLOAT_INT = 6;
}
