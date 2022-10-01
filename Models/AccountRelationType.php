<?php
/**
 * Karaka
 *
 * PHP Version 8.1
 *
 * @package   Modules\Marketing\Models
 * @copyright Dennis Eichhorn
 * @license   OMS License 1.0
 * @version   1.0.0
 * @link      https://karaka.app
 */
declare(strict_types=1);

namespace Modules\Marketing\Models;

use phpOMS\Stdlib\Base\Enum;

/**
 * Account relation type enum.
 *
 * @package Modules\Marketing\Models
 * @license OMS License 1.0
 * @link    https://karaka.app
 * @since   1.0.0
 */
abstract class AccountRelationType extends Enum
{
    public const CUSTOMER = 1;
}