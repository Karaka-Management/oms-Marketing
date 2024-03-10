<?php
/**
 * Jingga
 *
 * PHP Version 8.1
 *
 * @package   Modules\Marketing
 * @copyright Dennis Eichhorn
 * @license   OMS License 2.0
 * @version   1.0.0
 * @link      https://jingga.app
 */
declare(strict_types=1);

use Modules\Marketing\Models\NullPromotion;

$promotion = $this->data['promotion'] ?? new NullPromotion();

echo $this->data['nav']->render(); ?>

<div class="row">
    <div class="col-xs-12 col-md-6">
        <section class="portlet">
            <form action="<?= \phpOMS\Uri\UriFactory::build('{/api}marketing/promotion'); ?>" method="post">
            <div class="portlet-head"><?= $this->getHtml('Promotion'); ?></div>
            <div class="portlet-body">
                <div class="form-group">
                    <label for="iType"><?= $this->getHtml('Type'); ?></label>
                    <select id="iType" name="type"></select>
                </div>

                <div class="form-group">
                    <label for="iTitle"><?= $this->getHtml('Title'); ?></label>
                    <input id="iTitle" type="text" name="title">
                </div>

                <div class="form-group">
                    <label for="iDescription"><?= $this->getHtml('Description'); ?></label>
                    <textarea id="iDescription" name="description"></textarea>
                </div>

                <div class="line-flex">
                    <div>
                        <div class="form-group">
                            <label for="iStart"><?= $this->getHtml('Start'); ?></label>
                            <input id="iSTart" type="datetime-local">
                        </div>
                    </div>

                    <div>
                        <div class="form-group">
                            <label for="iEnd"><?= $this->getHtml('End'); ?></label>
                            <input id="iEnd" type="datetime-local">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="iBudget"><?= $this->getHtml('Budget'); ?></label>
                    <input type="text" id="iBudget" name="budget" placeholder="">
                </div>
            </div>
            <div class="portlet-foot">
                <?php if ($promotion->id === 0) : ?>
                    <input id="iCreateSubmit" type="Submit" value="<?= $this->getHtml('Create', '0', '0'); ?>">
                <?php else : ?>
                    <input id="iSaveSubmit" type="Submit" value="<?= $this->getHtml('Save', '0', '0'); ?>">
                <?php endif; ?>
            </div>
            </form>
        </section>
    </div>

    <?php if ($promotion->id !== 0) : ?>
    <div class="col-xs-12 col-md-6">
        <div class="box wf-100">
            <?= $this->getData('tasklist')->render($promotion->tasks); ?>
        </div>
    </div>
    <?php endif; ?>
</div>

<?php if ($promotion->id !== 0) : ?>
<div class="row">
    <div class="col-xs-12 col-md-6">
        <?= $this->getData('calendar')->render($promotion->getCalendar()); ?>
    </div>

    <div class="col-xs-12 col-md-6">
        <?= $this->getData('medialist')->render($promotion->files); ?>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-md-6">
        <section class="box wf-100">
            <header><h1>Finances</h1></header>
        </section>
    </div>
</div>
<?php endif; ?>