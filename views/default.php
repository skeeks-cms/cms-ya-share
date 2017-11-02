<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 03.07.2015
 */
/* @var $this yii\web\View */
/* @var $widget \skeeks\cms\yandex\share\widget\YaShareWidget */
?>
<div class="ya-share2"
     data-lang="ru"
     data-size="<?= $widget->size; ?>"
     data-services="<?= implode(',', $widget->services); ?>"
    <?= $widget->is_counter ? 'data-counter=""' : '' ?>
></div>

