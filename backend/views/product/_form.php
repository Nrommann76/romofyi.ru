<?php
use yii\widgets\ActiveForm;
//use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;
use common\models\Type;
use common\models\Manufacturer;
use common\models\User;

$form = ActiveForm::begin(); ?>

<?= $form->field($model, 'name')->textInput() ?>

<?= $form->field($model, 'price')->textInput(['type' => 'number']) ?>

<?= $form->field($model, 'type')->dropDownList(Type::find()->select(['name', 'id'])->indexBy('id')->column()) ?>

<?= $form->field($model, 'manufacturer')->dropDownList(Manufacturer::find()->select(['name', 'id'])->indexBy('id')->column()) ?>

<?= $form->field($model, 'gallery')->widget(\kartik\file\FileInput::class, [
    'name' => 'gallery[]',
    'options' => [
        'multiple' => true
    ]
]) ?>

<?= $form->field($model, 'productCharacteristic')->textarea(['rows' => 6]) ?>


<?= $form->field($model, 'productVariables')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Создать', ['class' => 'btn btn-success']) ?>
    </div>

<?php ActiveForm::end(); ?>