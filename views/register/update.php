<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Register $model */

$this->title = 'Update Register: ' . $model->tbl_register_id;
$this->params['breadcrumbs'][] = ['label' => 'Registers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->tbl_register_id, 'url' => ['view', 'tbl_register_id' => $model->tbl_register_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="register-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
