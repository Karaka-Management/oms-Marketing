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

use Modules\Marketing\Models\NullPromotionAttributeValue;

/**
 * @internal
 */
final class NullPromotionAttributeValueTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @covers Modules\Marketing\Models\NullPromotionAttributeValue
     * @group module
     */
    public function testNull() : void
    {
        self::assertInstanceOf('\Modules\Marketing\Models\PromotionAttributeValue', new NullPromotionAttributeValue());
    }

    /**
     * @covers Modules\Marketing\Models\NullPromotionAttributeValue
     * @group module
     */
    public function testId() : void
    {
        $null = new NullPromotionAttributeValue(2);
        self::assertEquals(2, $null->getId());
    }

    /**
     * @covers Modules\Marketing\Models\NullPromotionAttributeValue
     * @group module
     */
    public function testJsonSerialize() : void
    {
        $null = new NullPromotionAttributeValue(2);
        self::assertEquals(['id' => 2], $null);
    }
}
