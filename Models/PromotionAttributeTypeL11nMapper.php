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
final class PromotionAttributeTypeL11nMapper extends DataMapperAbstract
{
    /**
     * Columns.
     *
     * @var array<string, array{name:string, type:string, internal:string, autocomplete?:bool, readonly?:bool, writeonly?:bool, annotations?:array}>
     * @since 1.0.0
     */
    protected static array $columns = [
        'marketing_promotion_attr_type_l11n_id'        => ['name' => 'marketing_promotion_attr_type_l11n_id',       'type' => 'int',    'internal' => 'id'],
        'marketing_promotion_attr_type_l11n_title'     => ['name' => 'marketing_promotion_attr_type_l11n_title',    'type' => 'string', 'internal' => 'title', 'autocomplete' => true],
        'marketing_promotion_attr_type_l11n_type'      => ['name' => 'marketing_promotion_attr_type_l11n_type',      'type' => 'int',    'internal' => 'type'],
        'marketing_promotion_attr_type_l11n_lang'      => ['name' => 'marketing_promotion_attr_type_l11n_lang', 'type' => 'string', 'internal' => 'language'],
    ];

    /**
     * Primary table.
     *
     * @var string
     * @since 1.0.0
     */
    protected static string $table = 'marketing_promotion_attr_type_l11n';

    /**
     * Primary field name.
     *
     * @var string
     * @since 1.0.0
     */
    protected static string $primaryField = 'marketing_promotion_attr_type_l11n_id';
}
