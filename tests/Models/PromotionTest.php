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

use Modules\Admin\Models\NullAccount;
use Modules\Marketing\Models\Promotion;
use Modules\Tasks\Models\Task;
use phpOMS\Localization\Money;

/**
 * @internal
 */
class PromotionTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @covers Modules\Marketing\Models\Promotion
     * @group module
     */
    public function testDefault() : void
    {
        $promotion = new Promotion();

        self::assertEquals(0, $promotion->getId());
        self::assertInstanceOf('\Modules\Calendar\Models\Calendar', $promotion->getCalendar());
        self::assertEquals((new \DateTime('now'))->format('Y-m-d'), $promotion->createdAt->format('Y-m-d'));
        self::assertEquals((new \DateTime('now'))->format('Y-m-d'), $promotion->getStart()->format('Y-m-d'));
        self::assertEquals((new \DateTime('now'))->modify('+1 month')->format('Y-m-d'), $promotion->getEnd()->format('Y-m-d'));
        self::assertEquals(0, $promotion->createdBy->getId());
        self::assertEquals('', $promotion->getName());
        self::assertEquals('', $promotion->description);
        self::assertEquals(0, $promotion->getCosts()->getInt());
        self::assertEquals(0, $promotion->getBudget()->getInt());
        self::assertEquals(0, $promotion->getEarnings()->getInt());
        self::assertEmpty($promotion->getTasks());
        self::assertFalse($promotion->removeTask(2));
        self::assertInstanceOf('\Modules\Tasks\Models\Task', $promotion->getTask(0));
    }

    /**
     * @covers Modules\Marketing\Models\Promotion
     * @group module
     */
    public function testSetGet() : void
    {
        $promotion = new Promotion();

        $promotion->setName('Promotion');
        self::assertEquals('Promotion', $promotion->getName());

        $promotion->description = 'Description';
        self::assertEquals('Description', $promotion->description);

        $promotion->setStart($date = new \DateTime('2000-05-05'));
        self::assertEquals($date->format('Y-m-d'), $promotion->getStart()->format('Y-m-d'));

        $promotion->setEnd($date = new \DateTime('2000-05-05'));
        self::assertEquals($date->format('Y-m-d'), $promotion->getEnd()->format('Y-m-d'));

        $money = new Money();
        $money->setString('1.23');

        $promotion->setCosts($money);
        self::assertEquals($money->getAmount(), $promotion->getCosts()->getAmount());

        $promotion->setBudget($money);
        self::assertEquals($money->getAmount(), $promotion->getBudget()->getAmount());

        $promotion->setEarnings($money);
        self::assertEquals($money->getAmount(), $promotion->getEarnings()->getAmount());

        $task        = new Task();
        $task->title = 'Promo Task A';
        $task->setCreatedBy(new NullAccount(1));

        $promotion->addTask($task);

        self::assertEquals('Promo Task A', $promotion->getTask(0)->title);
        self::assertCount(1, $promotion->getTasks());
        self::assertTrue($promotion->removeTask(0));
        self::assertEquals(0, $promotion->countTasks());
    }
}
