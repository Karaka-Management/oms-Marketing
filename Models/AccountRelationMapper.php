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

use Modules\Admin\Models\AccountMapper;
use phpOMS\DataStorage\Database\Mapper\DataMapperFactory;

/**
 * Mapper class.
 *
 * @package Modules\Marketing\Models
 * @license OMS License 2.0
 * @link    https://jingga.app
 * @since   1.0.0
 *
 * @template T of AccountRelation
 * @extends DataMapperFactory<T>
 */
final class AccountRelationMapper extends DataMapperFactory
{
    /**
     * Columns.
     *
     * @var array<string, array{name:string, type:string, internal:string, autocomplete?:bool, readonly?:bool, writeonly?:bool, annotations?:array}>
     * @since 1.0.0
     */
    public const COLUMNS = [
        'marketing_promotion_accountrel_id'        => ['name' => 'marketing_promotion_accountrel_id',        'type' => 'int', 'internal' => 'id'],
        'marketing_promotion_accountrel_promotion' => ['name' => 'marketing_promotion_accountrel_promotion', 'type' => 'int', 'internal' => 'promotion'],
        'marketing_promotion_accountrel_type'      => ['name' => 'marketing_promotion_accountrel_type',      'type' => 'int', 'internal' => 'type'],
    ];

    /**
     * Has one relation.
     *
     * @var array<string, array{mapper:class-string, external:string, by?:string, column?:string, conditional?:bool}>
     * @since 1.0.0
     */
    public const OWNS_ONE = [
        'account' => [
            'mapper'   => AccountMapper::class,
            'external' => 'marketing_promotion_accountrel_account',
        ],
    ];

    /**
     * Primary table.
     *
     * @var string
     * @since 1.0.0
     */
    public const TABLE = 'marketing_promotion_accountrel';

    /**
     * Primary field name.
     *
     * @var string
     * @since 1.0.0
     */
    public const PRIMARYFIELD = 'marketing_promotion_accountrel_id';
}
