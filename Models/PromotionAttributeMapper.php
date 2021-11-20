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
final class PromotionAttributeMapper extends DataMapperAbstract
{
    /**
     * Columns.
     *
     * @var array<string, array{name:string, type:string, internal:string, autocomplete?:bool, readonly?:bool, writeonly?:bool, annotations?:array}>
     * @since 1.0.0
     */
    protected static array $columns = [
        'marketing_promotion_attr_id'    => ['name' => 'marketing_promotion_attr_id',    'type' => 'int', 'internal' => 'id'],
        'marketing_promotion_attr_promotion'  => ['name' => 'marketing_promotion_attr_promotion',  'type' => 'int', 'internal' => 'promotion'],
        'marketing_promotion_attr_type'  => ['name' => 'marketing_promotion_attr_type',  'type' => 'int', 'internal' => 'type'],
        'marketing_promotion_attr_value' => ['name' => 'marketing_promotion_attr_value', 'type' => 'int', 'internal' => 'value'],
    ];

    /**
     * Has one relation.
     *
     * @var array<string, array{mapper:string, external:string, by?:string, column?:string, conditional?:bool}>
     * @since 1.0.0
     */
    protected static array $ownsOne = [
        'type' => [
            'mapper'            => PromotionAttributeTypeMapper::class,
            'external'          => 'marketing_promotion_attr_type',
        ],
        'value' => [
            'mapper'            => PromotionAttributeValueMapper::class,
            'external'          => 'marketing_promotion_attr_value',
        ],
    ];

    /**
     * Primary table.
     *
     * @var string
     * @since 1.0.0
     */
    protected static string $table = 'marketing_promotion_attr';

    /**
     * Primary field name.
     *
     * @var string
     * @since 1.0.0
     */
    protected static string $primaryField = 'marketing_promotion_attr_id';
}
