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
use Modules\Marketing\Models\PromotionMapper;
use Modules\Marketing\Models\ProgressType;
use Modules\Media\Models\Media;
use Modules\Tasks\Models\Task;
use phpOMS\Localization\Money;
use phpOMS\Utils\RnG\Text;

/**
 * @internal
 */
final class PromotionMapperTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @covers Modules\Marketing\Models\PromotionMapper
     * @group module
     */
    public function testCRUD() : void
    {
        $promotion = new Promotion();

        $promotion->name = 'Promotionname';
        $promotion->description = 'Description';
        $promotion->createdBy   = new NullAccount(1);
        $promotion->start       = new \DateTime('2000-05-05');
        $promotion->end         = new \DateTime('2005-05-05');

        $money = new Money();
        $money->setString('1.23');

        $promotion->costs    = $money;
        $promotion->budget   = $money;
        $promotion->earnings = $money;

        $task        = new Task();
        $task->title = 'EventTask 1';
        $task->setCreatedBy(new NullAccount(1));

        $task2        = new Task();
        $task2->title = 'EventTask 2';
        $task2->setCreatedBy(new NullAccount(1));

        $promotion->addTask($task);
        $promotion->addTask($task2);

        $promotion->progress = 11;
        $promotion->setProgressType(ProgressType::TASKS);

        $media              = new Media();
        $media->createdBy   = new NullAccount(1);
        $media->description = 'desc';
        $media->setPath('some/path');
        $media->size      = 11;
        $media->extension = 'png';
        $media->name      = 'Event Media';
        $promotion->addMedia($media);

        $id = PromotionMapper::create($promotion);
        self::assertGreaterThan(0, $promotion->getId());
        self::assertEquals($id, $promotion->getId());

        $promotionR = PromotionMapper::get($promotion->getId());

        self::assertEquals($promotion->name, $promotionR->name);
        self::assertEquals($promotion->description, $promotionR->description);
        self::assertEquals($promotion->countTasks(), $promotionR->countTasks());
        self::assertEquals($promotion->start->format('Y-m-d'), $promotionR->start->format('Y-m-d'));
        self::assertEquals($promotion->end->format('Y-m-d'), $promotionR->end->format('Y-m-d'));
        self::assertEquals($promotion->costs->getAmount(), $promotionR->costs->getAmount());
        self::assertEquals($promotion->budget->getAmount(), $promotionR->budget->getAmount());
        self::assertEquals($promotion->earnings->getAmount(), $promotionR->earnings->getAmount());
        self::assertEquals($promotion->progress, $promotionR->progress);
        self::assertEquals($promotion->getProgressType(), $promotionR->getProgressType());

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
}
