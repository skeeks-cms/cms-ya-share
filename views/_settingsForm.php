<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 27.05.2015
 */
/* @var $this yii\web\View */
?>
<?= $form->fieldSet('Отображение'); ?>
    <?= $form->field($model, 'viewFile')->textInput(); ?>
<?= $form->fieldSetEnd(); ?>

<?= $form->fieldSet('Параметр виджета'); ?>
    <?= $form->field($model, 'services')->checkboxList(\skeeks\cms\yandex\share\widget\YaShareWidget::$possibleService)->hint('Выберите сервисы, иконки которых будут стоять рядом с кнопкой:'); ?>
    <?= $form->field($model, 'is_counter')->checkbox(\Yii::$app->formatter->booleanFormat); ?>

    <?= $form->field($model, 'size')->listBox([
        \skeeks\cms\yandex\share\widget\YaShareWidget::SIZE_BIG => 'Большого размера',
        \skeeks\cms\yandex\share\widget\YaShareWidget::SIZE_SMALL => 'Маленького размера'
    ]); ?>

<?= $form->fieldSetEnd(); ?>

