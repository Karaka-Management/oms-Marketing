<?php
/**
 * Orange Management
 *
 * PHP Version 8.0
 *
 * @package   tests
 * @copyright Dennis Eichhorn
 * @license   OMS License 1.0
 * @version   1.0.0
 * @link      https://orange-management.org
 */
declare(strict_types=1);

namespace Modules\Marketing\tests\Models;

use Modules\Marketing\Models\ProgressType;
use Modules\Marketing\Models\Promotion;
use Modules\Media\Models\Media;
use Modules\Tasks\Models\Task;
use phpOMS\Localization\Money;

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
        self::assertEquals(0, $this->promotion->getId());
        self::assertInstanceOf('\Modules\Calendar\Models\Calendar', $this->promotion->calendar);
        self::assertEquals((new \DateTime('now'))->format('Y-m-d'), $this->promotion->start->format('Y-m-d'));
        self::assertEquals((new \DateTime('now'))->modify('+1 month')->format('Y-m-d'), $this->promotion->end->format('Y-m-d'));
        self::assertEquals(0, $this->promotion->costs->getInt());
        self::assertEquals(0, $this->promotion->budget->getInt());
        self::assertEquals(0, $this->promotion->earnings->getInt());
        self::assertFalse($this->promotion->removeTask(2));
        self::assertEmpty($this->promotion->getTasks());
        self::assertEmpty($this->promotion->getMedia());
        self::assertInstanceOf('\Modules\Tasks\Models\NullTask', $this->promotion->getTask(1));
        self::assertEquals(0, $this->promotion->progress);
        self::assertEquals(ProgressType::MANUAL, $this->promotion->getProgressType());
    }

    /**
     * @covers Modules\Marketing\Models\Promotion
     * @group module
     */
    public function testCostsInputOutput() : void
    {
        $money = new Money();
        $money->setString('1.23');

        $this->promotion->costs = $money;
        self::assertEquals($money->getAmount(), $this->promotion->costs->getAmount());
    }

    /**
     * @covers Modules\Marketing\Models\Promotion
     * @group module
     */
    public function testBudgetInputOutput() : void
    {
        $money = new Money();
        $money->setString('1.23');

        $this->promotion->budget = $money;
        self::assertEquals($money->getAmount(), $this->promotion->budget->getAmount());
    }

    /**
     * @covers Modules\Marketing\Models\Promotion
     * @group module
     */
    public function testEarningsInputOutput() : void
    {
        $money = new Money();
        $money->setString('1.23');

        $this->promotion->earnings = $money;
        self::assertEquals($money->getAmount(), $this->promotion->earnings->getAmount());
    }

    /**
     * @covers Modules\Marketing\Models\Promotion
     * @group module
     */
    public function testMediaInputOutput() : void
    {
        $this->promotion->addMedia(new Media());
        self::assertCount(1, $this->promotion->getMedia());
    }

    /**
     * @covers Modules\Marketing\Models\Promotion
     * @group module
     */
    public function testTaskInputOutput() : void
    {
        $task        = new Task();
        $task->title = 'A';

        $this->promotion->addTask($task);
        self::assertEquals('A', $this->promotion->getTask(0)->title);

        self::assertTrue($this->promotion->removeTask(0));
        self::assertEquals(0, $this->promotion->countTasks());

        $this->promotion->addTask($task);
        self::assertCount(1, $this->promotion->getTasks());
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
                'id'           => 0,
                'start'        => $this->promotion->start,
                'end'          => $this->promotion->end,
                'name'         => 'Name',
                'description'  => 'Description',
                'costs'        => new Money(),
                'budget'       => new Money(),
                'earnings'     => new Money(),
                'tasks'        => [],
                'media'        => [],
                'progress'     => 10,
                'progressType' => ProgressType::TASKS,
            ],
            $serialized
        );
    }
}
