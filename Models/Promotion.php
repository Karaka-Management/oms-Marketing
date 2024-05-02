<?php
/**
 * Jingga
 *
 * PHP Version 8.2
 *
 * @package   Modules\Marketing\Models
 * @copyright Dennis Eichhorn
 * @license   OMS License 2.0
 * @version   1.0.0
 * @link      https://jingga.app
 */
declare(strict_types=1);

namespace Modules\Marketing\Models;

use Modules\Admin\Models\Account;
use Modules\Admin\Models\NullAccount;
use Modules\Calendar\Models\Calendar;
use Modules\Tasks\Models\Task;
use phpOMS\Stdlib\Base\FloatInt;

/**
 * Promotion class.
 *
 * @package Modules\Marketing\Models
 * @license OMS License 2.0
 * @link    https://jingga.app
 * @since   1.0.0
 *
 * @todo Promotion type (somehow use for cost center)
 *      https://github.com/Karaka-Management/oms-Marketing/issues/4
 */
class Promotion
{
    /**
     * ID.
     *
     * @var int
     * @since 1.0.0
     */
    public int $id = 0;

    /**
     * Event start.
     *
     * @var \DateTime
     * @since 1.0.0
     */
    public \DateTime $start;

    /**
     * Event end.
     *
     * @var \DateTime
     * @since 1.0.0
     */
    public \DateTime $end;

    /**
     * Name.
     *
     * @var string
     * @since 1.0.0
     */
    public string $name = '';

    /**
     * Description.
     *
     * @var string
     * @since 1.0.0
     */
    public string $description = '';

    /**
     * Calendar.
     *
     * @var Calendar
     * @since 1.0.0
     */
    public Calendar $calendar;

    /**
     * Budget costs.
     *
     * @var FloatInt
     * @since 1.0.0
     */
    public FloatInt $budgetCosts;

    /**
     * Budget earnings.
     *
     * @var FloatInt
     * @since 1.0.0
     */
    public FloatInt $budgetEarnings;

    /**
     * Current total costs.
     *
     * @var FloatInt
     * @since 1.0.0
     */
    public FloatInt $actualCosts;

    /**
     * Current total earnings.
     *
     * @var FloatInt
     * @since 1.0.0
     */
    public FloatInt $actualEarnings;

    /**
     * Tasks.
     *
     * @var Task[]
     * @since 1.0.0
     */
    public array $tasks = [];

    /**
     * Progress (0-100).
     *
     * @var int
     * @since 1.0.0
     */
    public int $progress = 0;

    /**
     * Progress type.
     *
     * @var int
     * @since 1.0.0
     */
    public int $progressType = ProgressType::MANUAL;

    /**
     * Created.
     *
     * @var \DateTimeImmutable
     * @since 1.0.0
     */
    public \DateTimeImmutable $createdAt;

    /**
     * Creator.
     *
     * @var Account
     * @since 1.0.0
     */
    public Account $createdBy;

    /**
     * Account relations
     *
     * @var AccountRelation[]
     * @since 1.0.0
     */
    public array $accountRelations = [];

    /**
     * Constructor.
     *
     * @param string $name Event name/title
     *
     * @since 1.0.0
     */
    public function __construct(string $name = '')
    {
        $this->start          = new \DateTime('now');
        $this->end            = (new \DateTime('now'))->modify('+1 month');
        $this->calendar       = new Calendar();
        $this->actualCosts    = new FloatInt();
        $this->actualEarnings = new FloatInt();
        $this->budgetCosts    = new FloatInt();
        $this->budgetEarnings = new FloatInt();
        $this->createdAt      = new \DateTimeImmutable('now');
        $this->createdBy      = new NullAccount();

        $this->name = $name;
    }

    /**
     * Get progress type.
     *
     * @return int
     *
     * @since 1.0.0
     */
    public function getProgressType() : int
    {
        return $this->progressType;
    }

    /**
     * Set progress type.
     *
     * @param int $type Progress type
     *
     * @return void
     *
     * @since 1.0.0
     */
    public function setProgressType(int $type) : void
    {
        $this->progressType = $type;
    }

    /**
     * Add account relation
     *
     * @param AccountRelation $accRel Account relation
     *
     * @return void
     *
     * @since 1.0.0
     */
    public function addAccount(AccountRelation $accRel) : void
    {
        $this->accountRelations[] = $accRel;
    }

    /**
     * Get relations to the promotions.
     *
     * This includes customers, partners, ...
     *
     * @return array
     *
     * @since 1.0.0
     */
    public function getRelations() : array
    {
        return $this->accountRelations;
    }

    /**
     * {@inheritdoc}
     */
    public function toArray() : array
    {
        return [
            'id'             => $this->id,
            'start'          => $this->start,
            'end'            => $this->end,
            'name'           => $this->name,
            'description'    => $this->description,
            'calendar'       => $this->calendar,
            'budgetCosts'    => $this->budgetCosts,
            'budgetEarnings' => $this->budgetEarnings,
            'actualCosts'    => $this->actualCosts,
            'actualEarnings' => $this->actualEarnings,
            'tasks'          => $this->tasks,
            'media'          => $this->files,
            'progress'       => $this->progress,
            'progressType'   => $this->progressType,
            'createdAt'      => $this->createdAt,
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function jsonSerialize() : mixed
    {
        return $this->toArray();
    }

    use \Modules\Media\Models\MediaListTrait;
    use \Modules\Attribute\Models\AttributeHolderTrait;
}
