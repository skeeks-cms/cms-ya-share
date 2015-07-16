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


    <?
    $this->registerJs(<<<JS

JS
    );
    ?>
    <div class="yashare-auto-init" data-yashareL10n="ru" data-yashareType="<?= $widget->typeView; ?>" data-yashareQuickServices="<?= implode(',', $widget->services); ?>" <?= $widget->typeView == \skeeks\cms\yandex\share\widget\YaShareWidget::TYPE_BUTTON ? 'data-yashareTheme="counter"' : '' ?> ></div>

