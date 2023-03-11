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
final class PromotionAttributeMapper extends DataMapperFactory
{
    /**
     * Columns.
     *
     * @var array<string, array{name:string, type:string, internal:string, autocomplete?:bool, readonly?:bool, writeonly?:bool, annotations?:array}>
     * @since 1.0.0
     */
    public const COLUMNS = [
        'marketing_promotion_attr_id'        => ['name' => 'marketing_promotion_attr_id',        'type' => 'int', 'internal' => 'id'],
        'marketing_promotion_attr_promotion' => ['name' => 'marketing_promotion_attr_promotion', 'type' => 'int', 'internal' => 'promotion'],
        'marketing_promotion_attr_type'      => ['name' => 'marketing_promotion_attr_type',      'type' => 'int', 'internal' => 'type'],
        'marketing_promotion_attr_value'     => ['name' => 'marketing_promotion_attr_value',     'type' => 'int', 'internal' => 'value'],
    ];

    /**
     * Has one relation.
     *
     * @var array<string, array{mapper:class-string, external:string, by?:string, column?:string, conditional?:bool}>
     * @since 1.0.0
     */
    public const OWNS_ONE = [
        'type' => [
            'mapper'   => PromotionAttributeTypeMapper::class,
            'external' => 'marketing_promotion_attr_type',
        ],
        'value' => [
            'mapper'   => PromotionAttributeValueMapper::class,
            'external' => 'marketing_promotion_attr_value',
        ],
    ];

    /**
     * Primary table.
     *
     * @var string
     * @since 1.0.0
     */
    public const TABLE = 'marketing_promotion_attr';

    /**
     * Primary field name.
     *
     * @var string
     * @since 1.0.0
     */
    public const PRIMARYFIELD = 'marketing_promotion_attr_id';
}
