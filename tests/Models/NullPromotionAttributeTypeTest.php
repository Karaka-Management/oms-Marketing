<?php
/**
 * Jingga
 *
 * PHP Version 8.1
 *
 * @package   tests
 * @copyright Dennis Eichhorn
 * @license   OMS License 2.0
 * @version   1.0.0
 * @link      https://jingga.app
 */
declare(strict_types=1);

namespace Modules\Marketing\tests\Models;

use Modules\Marketing\Models\NullPromotionAttributeType;

/**
 * @internal
 */
final class NullPromotionAttributeTypeTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @covers Modules\Marketing\Models\NullPromotionAttributeType
     * @group framework
     */
    public function testNull() : void
    {
        self::assertInstanceOf('\Modules\Marketing\Models\PromotionAttributeType', new NullPromotionAttributeType());
    }

    /**
     * @covers Modules\Marketing\Models\NullPromotionAttributeType
     * @group framework
     */
    public function testId() : void
    {
        $null = new NullPromotionAttributeType(2);
        self::assertEquals(2, $null->getId());
    }

    /**
     * @covers Modules\Marketing\Models\NullPromotionAttributeType
     * @group framework
     */
    public function testJsonSerialize() : void
    {
        $null = new NullPromotionAttributeType(2);
        self::assertEquals(['id' => 2], $null);
    }
}
