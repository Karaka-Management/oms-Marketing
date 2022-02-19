<?php
/**
 * Karaka
 *
 * PHP Version 8.0
 *
 * @package   Modules\Marketing\Models
 * @copyright Dennis Eichhorn
 * @license   OMS License 1.0
 * @version   1.0.0
 * @link      https://karaka.app
 */
declare(strict_types=1);

namespace Modules\Marketing\Models;

/**
 * Null model
 *
 * @package Modules\Marketing\Models
 * @license OMS License 1.0
 * @link    https://karaka.app
 * @since   1.0.0
 */
final class NullPromotionAttribute extends PromotionAttribute
{
    /**
     * Constructor
     *
     * @param int $id Model id
     *
     * @since 1.0.0
     */
    public function __construct(int $id = 0)
    {
        parent::__construct();
        $this->id = $id;
    }
}
