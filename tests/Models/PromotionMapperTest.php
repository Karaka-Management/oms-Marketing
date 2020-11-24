<?php
/**
 * Orange Management
 *
 * PHP Version 7.4
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
use Modules\Marketing\Models\PromotionMapper;
use Modules\Media\Models\Media;
use Modules\Tasks\Models\Task;
use phpOMS\Localization\Money;
use phpOMS\Utils\RnG\Text;

/**
 * @internal
 */
class PromotionMapperTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @covers Modules\Marketing\Models\PromotionMapper
     * @group module
     */
    public function testCRUD() : void
    {
        $promotion = new Promotion();

        $promotion->setName('Promotionname');
        $promotion->description = 'Description';
        $promotion->createdBy = new NullAccount(1);
        $promotion->setStart(new \DateTime('2000-05-05'));
        $promotion->setEnd(new \DateTime('2005-05-05'));

        $money = new Money();
        $money->setString('1.23');

        $promotion->setCosts($money);
        $promotion->setBudget($money);
        $promotion->setEarnings($money);

        $task = new Task();
        $task->title = 'PromotionTask 1';
        $task->setCreatedBy(new NullAccount(1));

        $task2 = new Task();
        $task2->title = 'PromotionTask 2';
        $task2->setCreatedBy(new NullAccount(1));

        $promotion->addTask($task);
        $promotion->addTask($task2);

        $media = new Media();
        $media->createdBy = new NullAccount(1);
        $media->description = 'desc';
        $media->setPath('some/path');
        $media->size = 11;
        $media->extension = 'png';
        $media->name = 'Promotion Media';
        $promotion->addMedia($media);

        $id = PromotionMapper::create($promotion);
        self::assertGreaterThan(0, $promotion->getId());
        self::assertEquals($id, $promotion->getId());

        $promotionR = PromotionMapper::get($promotion->getId());

        self::assertEquals($promotion->getName(), $promotionR->getName());
        self::assertEquals($promotion->description, $promotionR->description);
        self::assertEquals($promotion->countTasks(), $promotionR->countTasks());
        self::assertEquals($promotion->getCosts()->getAmount(), $promotionR->getCosts()->getAmount());
        self::assertEquals($promotion->getBudget()->getAmount(), $promotionR->getBudget()->getAmount());
        self::assertEquals($promotion->getEarnings()->getAmount(), $promotionR->getEarnings()->getAmount());
        self::assertEquals($promotion->createdAt->format('Y-m-d'), $promotionR->createdAt->format('Y-m-d'));
        self::assertEquals($promotion->getStart()->format('Y-m-d'), $promotionR->getStart()->format('Y-m-d'));
        self::assertEquals($promotion->getEnd()->format('Y-m-d'), $promotionR->getEnd()->format('Y-m-d'));

        $expected = $promotion->getMedia();
        $actual   = $promotionR->getMedia();

        self::assertEquals(\end($expected)->name, \end($actual)->name);
    }

    /**
     * @covers Modules\Marketing\Models\PromotionMapper
     * @group module
     */
    public function testNewest() : void
    {
        $newest = PromotionMapper::getNewest(1);

        self::assertCount(1, $newest);
    }

    /**
     * @group volume
     * @group module
     * @coversNothing
     */
    public function testVolume() : void
    {
        for ($i = 1; $i < 100; ++$i) {
            $text = new Text();

            $promotion = new Promotion();

            $promotion->setName($text->generateText(\mt_rand(3, 7)));
            $promotion->description = $text->generateText(\mt_rand(20, 100));
            $promotion->createdBy = new NullAccount(1);
            $promotion->setStart(new \DateTime('2000-05-05'));
            $promotion->setEnd(new \DateTime('2005-05-05'));

            $money = new Money();
            $money->setString('1.23');

            $promotion->setCosts($money);
            $promotion->setBudget($money);
            $promotion->setEarnings($money);

            $id = PromotionMapper::create($promotion);
        }
    }
}
