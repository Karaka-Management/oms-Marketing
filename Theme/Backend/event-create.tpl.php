<?php
/**
 * Karaka
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

/**
 * @var \phpOMS\Views\View $this
 */

echo $this->getData('nav')->render(); ?>

<div class="row">
    <div class="col-xs-12 col-md-6">
        <section class="box wf-100">
            <header><h1><?= $this->getHtml('Event'); ?></h1></header>
            <div class="inner">
                <form action="<?= \phpOMS\Uri\UriFactory::build('{/api}helper/template'); ?>" method="post">
                    <table class="layout wf-100">
                        <tbody>
                        <tr><td colspan="2"><label for="iType"><?= $this->getHtml('Type'); ?></label>
                        <tr><td colspan="2"><select id="iType" name="type"></select>
                        <tr><td colspan="2"><label for="iTitle"><?= $this->getHtml('Title'); ?></label>
                        <tr><td colspan="2"><input id="iTitle" type="text" name="title">
                        <tr><td colspan="2"><label for="iDescription"><?= $this->getHtml('Description'); ?></label>
                        <tr><td colspan="2"><textarea id="iDescription" name="description"></textarea>
                        <tr><td><label for="iStart"><?= $this->getHtml('Start'); ?></label><td><label for="iEnd"><?= $this->getHtml('End'); ?></label>
                        <tr><td><input id="iSTart" type="datetime-local"><td><input id="iEnd" type="datetime-local">
                        <tr><td colspan="2"><label for="iBudget"><?= $this->getHtml('Budget'); ?></label>
                        <tr><td colspan="2"><input type="text" id="iBudget" name="budget" placeholder="">
                    </table>
                </form>
            </div>
        </section>
    </div>
</div>