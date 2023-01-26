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
 * @link      https://jingga.app
 */
declare(strict_types=1);

namespace Modules\Marketing\Models;

use phpOMS\DataStorage\Database\Mapper\DataMapperFactory;

/**
 * Promotion mapper class.
 *
 * @package Modules\Marketing\Models
 * @license OMS License 1.0
 * @link    https://jingga.app
 * @since   1.0.0
 */
final class PromotionAttributeTypeMapper extends DataMapperFactory
{
    /**
     * Columns.
     *
     * @var array<string, array{name:string, type:string, internal:string, autocomplete?:bool, readonly?:bool, writeonly?:bool, annotations?:array}>
     * @since 1.0.0
     */
    public const COLUMNS = [
        'marketing_promotion_attr_type_id'       => ['name' => 'marketing_promotion_attr_type_id',       'type' => 'int',    'internal' => 'id'],
        'marketing_promotion_attr_type_name'     => ['name' => 'marketing_promotion_attr_type_name',     'type' => 'string', 'internal' => 'name', 'autocomplete' => true],
        'marketing_promotion_attr_type_fields'   => ['name' => 'marketing_promotion_attr_type_fields',   'type' => 'int',    'internal' => 'fields'],
        'marketing_promotion_attr_type_custom'   => ['name' => 'marketing_promotion_attr_type_custom',   'type' => 'bool',   'internal' => 'custom'],
        'marketing_promotion_attr_type_pattern'  => ['name' => 'marketing_promotion_attr_type_pattern',  'type' => 'string', 'internal' => 'validationPattern'],
        'marketing_promotion_attr_type_required' => ['name' => 'marketing_promotion_attr_type_required', 'type' => 'bool',   'internal' => 'isRequired'],
    ];

    /**
     * Has many relation.
     *
     * @var array<string, array{mapper:string, table:string, self?:?string, external?:?string, column?:string}>
     * @since 1.0.0
     */
    public const HAS_MANY = [
        'l11n' => [
            'mapper'   => PromotionAttributeTypeL11nMapper::class,
            'table'    => 'marketing_promotion_attr_type_l11n',
            'self'     => 'marketing_promotion_attr_type_l11n_type',
            'column'   => 'content',
            'external' => null,
        ],
        'defaults' => [
            'mapper'   => PromotionAttributeValueMapper::class,
            'table'    => 'marketing_promotion_attr_default',
            'self'     => 'marketing_promotion_attr_default_type',
            'external' => 'marketing_promotion_attr_default_value',
        ],
    ];

    /**
     * Primary table.
     *
     * @var string
     * @since 1.0.0
     */
    public const TABLE = 'marketing_promotion_attr_type';

    /**
     * Primary field name.
     *
     * @var string
     * @since 1.0.0
     */
    public const PRIMARYFIELD ='marketing_promotion_attr_type_id';
}
