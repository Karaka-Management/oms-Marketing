<?php
/**
 * Jingga
 *
 * PHP Version 8.2
 *
 * @package   Modules\Marketing\Models
 * @copyright Dennis Eichhorn
 * @license   OMS License 2.2
 * @version   1.0.0
 * @link      https://jingga.app
 */
declare(strict_types=1);

namespace Modules\Marketing\Models;

/**
 * Promotion class.
 *
 * @package Modules\Marketing\Models
 * @license OMS License 2.2
 * @link    https://jingga.app
 * @since   1.0.0
 */
class PromotionAttribute implements \JsonSerializable
{
    /**
     * Id.
     *
     * @var int
     * @since 1.0.0
     */
    public int $id = 0;

    /**
     * Promotion this attribute belongs to
     *
     * @var int
     * @since 1.0.0
     */
    public int $promotion = 0;

    /**
     * Attribute type the attribute belongs to
     *
     * @var PromotionAttributeType
     * @since 1.0.0
     */
    public PromotionAttributeType $type;

    /**
     * Attribute value the attribute belongs to
     *
     * @var PromotionAttributeValue
     * @since 1.0.0
     */
    public PromotionAttributeValue $value;

    /**
     * Constructor.
     *
     * @since 1.0.0
     */
    public function __construct()
    {
        $this->type  = new NullPromotionAttributeType();
        $this->value = new NullPromotionAttributeValue();
    }

    /**
     * {@inheritdoc}
     */
    public function toArray() : array
    {
        return [
            'id'        => $this->id,
            'promotion' => $this->promotion,
            'type'      => $this->type,
            'value'     => $this->value,
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function jsonSerialize() : mixed
    {
        return $this->toArray();
    }
}
