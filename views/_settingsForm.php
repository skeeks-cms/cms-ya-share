<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 27.05.2015
 */
/* @var $this yii\web\View */
use skeeks\cms\modules\admin\widgets\form\ActiveFormUseTab as ActiveForm;
?>
<?php $form = ActiveForm::begin(); ?>
    <?= $form->fieldSet('Отображение'); ?>
        <?= $form->field($model, 'viewFile')->textInput(); ?>
    <?= $form->fieldSetEnd(); ?>

    <?= $form->fieldSet('Параметр виджета'); ?>
        <?= $form->field($model, 'services')->checkboxList(\skeeks\cms\yandex\share\widget\YaShareWidget::$possibleService)->hint('Выберите сервисы, иконки которых будут стоять рядом с кнопкой:'); ?>
        <?= $form->field($model, 'typeView')->radioList(\skeeks\cms\yandex\share\widget\YaShareWidget::$possibleTypes); ?>

<?= $form->fieldSetEnd(); ?>

<?= $form->buttonsStandart($model) ?>
<?php ActiveForm::end(); ?>