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
final class PromotionAttributeValueMapper extends DataMapperFactory
{
    /**
     * Columns.
     *
     * @var array<string, array{name:string, type:string, internal:string, autocomplete?:bool, readonly?:bool, writeonly?:bool, annotations?:array}>
     * @since 1.0.0
     */
    public const COLUMNS = [
        'marketing_promotion_attr_value_id'       => ['name' => 'marketing_promotion_attr_value_id',       'type' => 'int',      'internal' => 'id'],
        'marketing_promotion_attr_value_default'  => ['name' => 'marketing_promotion_attr_value_default',  'type' => 'bool',     'internal' => 'isDefault'],
        'marketing_promotion_attr_value_type'     => ['name' => 'marketing_promotion_attr_value_type',     'type' => 'int',      'internal' => 'type'],
        'marketing_promotion_attr_value_valueStr' => ['name' => 'marketing_promotion_attr_value_valueStr', 'type' => 'string',   'internal' => 'valueStr'],
        'marketing_promotion_attr_value_valueInt' => ['name' => 'marketing_promotion_attr_value_valueInt', 'type' => 'int',      'internal' => 'valueInt'],
        'marketing_promotion_attr_value_valueDec' => ['name' => 'marketing_promotion_attr_value_valueDec', 'type' => 'float',    'internal' => 'valueDec'],
        'marketing_promotion_attr_value_valueDat' => ['name' => 'marketing_promotion_attr_value_valueDat', 'type' => 'DateTime', 'internal' => 'valueDat'],
        'marketing_promotion_attr_value_lang'     => ['name' => 'marketing_promotion_attr_value_lang',     'type' => 'string',   'internal' => 'language'],
        'marketing_promotion_attr_value_country'  => ['name' => 'marketing_promotion_attr_value_country',  'type' => 'string',   'internal' => 'country'],
    ];

    /**
     * Primary table.
     *
     * @var string
     * @since 1.0.0
     */
    public const TABLE = 'marketing_promotion_attr_value';

    /**
     * Primary field name.
     *
     * @var string
     * @since 1.0.0
     */
    public const PRIMARYFIELD ='marketing_promotion_attr_value_id';
}
