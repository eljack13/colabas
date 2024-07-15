<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\RegisterSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="register-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'tbl_register_id') ?>

    <?= $form->field($model, 'tbl_register_nombre') ?>

    <?= $form->field($model, 'tbl_register_email') ?>

    <?= $form->field($model, 'tbl_registro_password') ?>

    <?= $form->field($model, 'tbl_registro_fecha') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
