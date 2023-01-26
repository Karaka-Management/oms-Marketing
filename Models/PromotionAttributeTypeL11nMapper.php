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
use phpOMS\Localization\BaseStringL11n;

/**
 * Promotion mapper class.
 *
 * @package Modules\Marketing\Models
 * @license OMS License 1.0
 * @link    https://jingga.app
 * @since   1.0.0
 */
final class PromotionAttributeTypeL11nMapper extends DataMapperFactory
{
    /**
     * Columns.
     *
     * @var array<string, array{name:string, type:string, internal:string, autocomplete?:bool, readonly?:bool, writeonly?:bool, annotations?:array}>
     * @since 1.0.0
     */
    public const COLUMNS = [
        'marketing_promotion_attr_type_l11n_id'    => ['name' => 'marketing_promotion_attr_type_l11n_id',    'type' => 'int',    'internal' => 'id'],
        'marketing_promotion_attr_type_l11n_title' => ['name' => 'marketing_promotion_attr_type_l11n_title', 'type' => 'string', 'internal' => 'content', 'autocomplete' => true],
        'marketing_promotion_attr_type_l11n_type'  => ['name' => 'marketing_promotion_attr_type_l11n_type',  'type' => 'int',    'internal' => 'ref'],
        'marketing_promotion_attr_type_l11n_lang'  => ['name' => 'marketing_promotion_attr_type_l11n_lang',  'type' => 'string', 'internal' => 'language'],
    ];

    /**
     * Primary table.
     *
     * @var string
     * @since 1.0.0
     */
    public const TABLE = 'marketing_promotion_attr_type_l11n';

    /**
     * Primary field name.
     *
     * @var string
     * @since 1.0.0
     */
    public const PRIMARYFIELD ='marketing_promotion_attr_type_l11n_id';

    /**
     * Model to use by the mapper.
     *
     * @var string
     * @since 1.0.0
     */
    public const MODEL = BaseStringL11n::class;
}
