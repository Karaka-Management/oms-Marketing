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
use Modules\Calendar\Models\CalendarMapper;
use Modules\Media\Models\MediaMapper;
use Modules\Tasks\Models\TaskMapper;
use phpOMS\DataStorage\Database\Mapper\DataMapperFactory;

/**
 * Mapper class.
 *
 * @package Modules\Marketing\Models
 * @license OMS License 2.0
 * @link    https://jingga.app
 * @since   1.0.0
 *
 * @template T of Promotion
 * @extends DataMapperFactory<T>
 */
final class PromotionMapper extends DataMapperFactory
{
    /**
     * Columns.
     *
     * @var array<string, array{name:string, type:string, internal:string, autocomplete?:bool, readonly?:bool, writeonly?:bool, annotations?:array}>
     * @since 1.0.0
     */
    public const COLUMNS = [
        'marketing_promotion_id'             => ['name' => 'marketing_promotion_id',             'type' => 'int',               'internal' => 'id'],
        'marketing_promotion_name'           => ['name' => 'marketing_promotion_name',           'type' => 'string',            'internal' => 'name'],
        'marketing_promotion_description'    => ['name' => 'marketing_promotion_description',    'type' => 'string',            'internal' => 'description'],
        'marketing_promotion_calendar'       => ['name' => 'marketing_promotion_calendar',       'type' => 'int',               'internal' => 'calendar'],
        'marketing_promotion_budgetcosts'    => ['name' => 'marketing_promotion_budgetcosts',    'type' => 'Serializable',      'internal' => 'budgetCosts'],
        'marketing_promotion_budgetearnings' => ['name' => 'marketing_promotion_budgetearnings', 'type' => 'Serializable',      'internal' => 'budgetEarnings'],
        'marketing_promotion_actualcosts'    => ['name' => 'marketing_promotion_actualcosts',    'type' => 'Serializable',      'internal' => 'actualCosts'],
        'marketing_promotion_actualearnings' => ['name' => 'marketing_promotion_actualearnings', 'type' => 'Serializable',      'internal' => 'actualEarnings'],
        'marketing_promotion_start'          => ['name' => 'marketing_promotion_start',          'type' => 'DateTime',          'internal' => 'start'],
        'marketing_promotion_end'            => ['name' => 'marketing_promotion_end',            'type' => 'DateTime',          'internal' => 'end'],
        'marketing_promotion_progress'       => ['name' => 'marketing_promotion_progress',       'type' => 'int',               'internal' => 'progress'],
        'marketing_promotion_progress_type'  => ['name' => 'marketing_promotion_progress_type',  'type' => 'int',               'internal' => 'progressType'],
        'marketing_promotion_created_by'     => ['name' => 'marketing_promotion_created_by',     'type' => 'int',               'internal' => 'createdBy', 'readonly' => true],
        'marketing_promotion_created_at'     => ['name' => 'marketing_promotion_created_at',     'type' => 'DateTimeImmutable', 'internal' => 'createdAt', 'readonly' => true],
    ];

    /**
     * Has many relation.
     *
     * @var array<string, array{mapper:class-string, table:string, self?:?string, external?:?string, column?:string}>
     * @since 1.0.0
     */
    public const HAS_MANY = [
        'tasks' => [
            'mapper'   => TaskMapper::class,
            'table'    => 'marketing_promotion_task_relation',
            'external' => 'marketing_promotion_task_relation_src',
            'self'     => 'marketing_promotion_task_relation_dst',
        ],
        'files' => [
            'mapper'   => MediaMapper::class,
            'table'    => 'marketing_promotion_media',
            'external' => 'marketing_promotion_media_dst',
            'self'     => 'marketing_promotion_media_src',
        ],
        'accountRelations' => [
            'mapper'   => AccountRelationMapper::class,
            'table'    => 'marketing_promotion_accountrel',
            'self'     => 'marketing_promotion_accountrel_promotion',
            'external' => null,
        ],
        'attributes' => [
            'mapper'      => PromotionAttributeMapper::class,
            'table'       => 'marketing_promotion_attr',
            'self'        => 'marketing_promotion_attr_promotion',
            'conditional' => true,
            'external'    => null,
        ],
    ];

    /**
     * Has one relation.
     *
     * @var array<string, array{mapper:class-string, external:string, by?:string, column?:string, conditional?:bool}>
     * @since 1.0.0
     */
    public const OWNS_ONE = [
        'calendar' => [
            'mapper'   => CalendarMapper::class,
            'external' => 'marketing_promotion_calendar',
        ],
    ];

    /**
     * Belongs to.
     *
     * @var array<string, array{mapper:class-string, external:string, column?:string, by?:string}>
     * @since 1.0.0
     */
    public const BELONGS_TO = [
        'createdBy' => [
            'mapper'   => AccountMapper::class,
            'external' => 'marketing_promotion_created_by',
        ],
    ];

    /**
     * Primary table.
     *
     * @var string
     * @since 1.0.0
     */
    public const TABLE = 'marketing_promotion';

    /**
     * Created at.
     *
     * @var string
     * @since 1.0.0
     */
    public const CREATED_AT = 'marketing_promotion_created_at';

    /**
     * Primary field name.
     *
     * @var string
     * @since 1.0.0
     */
    public const PRIMARYFIELD = 'marketing_promotion_id';
}
