<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Register $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="register-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tbl_register_nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tbl_register_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tbl_registro_password')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tbl_registro_fecha')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
