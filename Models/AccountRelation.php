<?php
/**
 * Orange Management
 *
 * PHP Version 8.0
 *
 * @package   Modules\Marketing\Models
 * @copyright Dennis Eichhorn
 * @license   OMS License 1.0
 * @version   1.0.0
 * @link      https://orange-management.org
 */
declare(strict_types=1);

namespace Modules\Marketing\Models;

use Modules\Admin\Models\Account;
use Modules\Admin\Models\NullAccount;

/**
 * Promotion class.
 *
 * @package Modules\Marketing\Models
 * @license OMS License 1.0
 * @link    https://orange-management.org
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
    protected int $id = 0;

    /**
     * Promotion
     *
     * @var int
     * @since 1.0.0
     */
    public int $promotion = 0;

    /**
     * Account
     *
     * @var Account
     * @since 1.0.0
     */
    public Account $account;

    /**
     * Account relation type
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

    /**
     * Get id.
     *
     * @return int Model id
     *
     * @since 1.0.0
     */
    public function getId() : int
    {
        return $this->id;
    }
}
