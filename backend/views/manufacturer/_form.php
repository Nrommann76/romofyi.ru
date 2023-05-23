<?php



/* @var $this \yii\web\View */
/* @var $model \common\models\Manufacturer */

$form = \yii\widgets\ActiveForm::begin();



?>

<?= $form->field($model, 'name') ?>

<?= yii\bootstrap5\Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>

<?php \yii\widgets\ActiveForm::end() ?>