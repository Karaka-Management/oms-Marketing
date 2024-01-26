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

use Modules\Marketing\Models\ProgressType;
use Modules\Marketing\Models\Promotion;
use phpOMS\Stdlib\Base\FloatInt;

/**
 * @internal
 */
final class PromotionTest extends \PHPUnit\Framework\TestCase
{
    private Promotion $promotion;

    /**
     * {@inheritdoc}
     */
    protected function setUp() : void
    {
        $this->promotion = new Promotion();
    }

    /**
     * @covers Modules\Marketing\Models\Promotion
     * @group module
     */
    public function testDefault() : void
    {
        self::assertEquals(0, $this->promotion->id);
        self::assertInstanceOf('\Modules\Calendar\Models\Calendar', $this->promotion->calendar);
        self::assertEquals((new \DateTime('now'))->format('Y-m-d'), $this->promotion->start->format('Y-m-d'));
        self::assertEquals((new \DateTime('now'))->modify('+1 month')->format('Y-m-d'), $this->promotion->end->format('Y-m-d'));
        self::assertEquals(0, $this->promotion->budgetCosts->getInt());
        self::assertEquals(0, $this->promotion->budgetEarnings->getInt());
        self::assertEquals(0, $this->promotion->actualCosts->getInt());
        self::assertEquals(0, $this->promotion->actualEarnings->getInt());
        self::assertEmpty($this->promotion->tasks);
        self::assertEmpty($this->promotion->files);
        self::assertEquals(0, $this->promotion->progress);
        self::assertEquals(ProgressType::MANUAL, $this->promotion->getProgressType());
    }

    /**
     * @covers Modules\Marketing\Models\Promotion
     * @group module
     */
    public function testProgressInputOutput() : void
    {
        $this->promotion->progress = 10;
        self::assertEquals(10, $this->promotion->progress);
    }

    /**
     * @covers Modules\Marketing\Models\Promotion
     * @group module
     */
    public function testProgressTypeInputOutput() : void
    {
        $this->promotion->setProgressType(ProgressType::TASKS);
        self::assertEquals(ProgressType::TASKS, $this->promotion->getProgressType());
    }

    /**
     * @covers Modules\Marketing\Models\Promotion
     * @group module
     */
    public function testSerialize() : void
    {
        $this->promotion->name        = 'Name';
        $this->promotion->description = 'Description';
        $this->promotion->start       = new \DateTime();
        $this->promotion->end         = new \DateTime();
        $this->promotion->progress    = 10;
        $this->promotion->setProgressType(ProgressType::TASKS);

        $serialized = $this->promotion->jsonSerialize();
        unset($serialized['calendar']);
        unset($serialized['createdAt']);

        self::assertEquals(
            [
                'id'             => 0,
                'start'          => $this->promotion->start,
                'end'            => $this->promotion->end,
                'name'           => 'Name',
                'description'    => 'Description',
                'budgetCosts'    => new FloatInt(),
                'budgetEarnings' => new FloatInt(),
                'actualCosts'    => new FloatInt(),
                'actualEarnings' => new FloatInt(),
                'tasks'          => [],
                'media'          => [],
                'progress'       => 10,
                'progressType'   => ProgressType::TASKS,
            ],
            $serialized
        );
    }
}
