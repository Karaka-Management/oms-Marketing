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

use phpOMS\DataStorage\Database\DataMapperAbstract;

/**
 * Promotion mapper class.
 *
 * @package Modules\Marketing\Models
 * @license OMS License 1.0
 * @link    https://orange-management.org
 * @since   1.0.0
 */
final class PromotionAttributeTypeMapper extends DataMapperAbstract
{
    /**
     * Columns.
     *
     * @var array<string, array{name:string, type:string, internal:string, autocomplete?:bool, readonly?:bool, writeonly?:bool, annotations?:array}>
     * @since 1.0.0
     */
    protected static array $columns = [
        'marketing_promotion_attr_type_id'       => ['name' => 'marketing_promotion_attr_type_id',     'type' => 'int',    'internal' => 'id'],
        'marketing_promotion_attr_type_name'     => ['name' => 'marketing_promotion_attr_type_name',   'type' => 'string', 'internal' => 'name', 'autocomplete' => true],
        'marketing_promotion_attr_type_fields'   => ['name' => 'marketing_promotion_attr_type_fields', 'type' => 'int',    'internal' => 'fields'],
        'marketing_promotion_attr_type_custom'   => ['name' => 'marketing_promotion_attr_type_custom', 'type' => 'bool', 'internal' => 'custom'],
        'marketing_promotion_attr_type_pattern'  => ['name' => 'marketing_promotion_attr_type_pattern', 'type' => 'string', 'internal' => 'validationPattern'],
        'marketing_promotion_attr_type_required' => ['name' => 'marketing_promotion_attr_type_required', 'type' => 'bool', 'internal' => 'isRequired'],
    ];

    /**
     * Has many relation.
     *
     * @var array<string, array{mapper:string, table:string, self?:?string, external?:?string, column?:string}>
     * @since 1.0.0
     */
    protected static array $hasMany = [
        'l11n' => [
            'mapper'            => PromotionAttributeTypeL11nMapper::class,
            'table'             => 'marketing_promotion_attr_type_l11n',
            'self'              => 'marketing_promotion_attr_type_l11n_type',
            'column'            => 'title',
            'conditional'       => true,
            'external'          => null,
        ],
        'defaults' => [
            'mapper'            => PromotionAttributeValueMapper::class,
            'table'             => 'marketing_promotion_attr_default',
            'self'              => 'marketing_promotion_attr_default_type',
            'external'          => 'marketing_promotion_attr_default_value',
            'conditional'       => false,
        ],
    ];

    /**
     * Primary table.
     *
     * @var string
     * @since 1.0.0
     */
    protected static string $table = 'marketing_promotion_attr_type';

    /**
     * Primary field name.
     *
     * @var string
     * @since 1.0.0
     */
    protected static string $primaryField = 'marketing_promotion_attr_type_id';
}
