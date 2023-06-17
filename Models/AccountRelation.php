<?php
/**
 * Jingga
 *
 * PHP Version 8.1
 *
 * @package   Modules\Marketing\Models
 * @copyright Dennis Eichhorn
 * @license   OMS License 2.0
 * @version   1.0.0
 * @link      https://jingga.app
 */
declare(strict_types=1);

namespace Modules\Marketing\Models;

use Modules\Admin\Models\Account;
use Modules\Admin\Models\NullAccount;

/**
 * AccountRelation class.
 *
 * @package Modules\Marketing\Models
 * @license OMS License 2.0
 * @link    https://jingga.app
 * @since   1.0.0
 */
class AccountRelation
{
    /**
     * ID.
     *
     * @var int
     * @since 1.0.0
     */
    public int $id = 0;

    /**
     * The ID of the promotion associated with this account relation.
     *
     * @var int
     * @since 1.0.0
     */
    public int $promotion = 0;

    /**
     * The account associated with this account relation.
     *
     * @var Account
     * @since 1.0.0
     */
    public Account $account;

    /**
     * The type of this account relation.
     *
     * @var int
     * @since 1.0.0
     */
    public int $type = AccountRelationType::CUSTOMER;

    /**
     * Constructor.
     *
     * @since 1.0.0
     */
    public function __construct()
    {
        $this->account = new NullAccount();
    }
}
