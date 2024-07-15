<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Register $model */

$this->title = $model->tbl_register_id;
$this->params['breadcrumbs'][] = ['label' => 'Registers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="register-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'tbl_register_id' => $model->tbl_register_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'tbl_register_id' => $model->tbl_register_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'tbl_register_id',
            'tbl_register_nombre',
            'tbl_register_email:email',
            'tbl_registro_password',
            'tbl_registro_fecha',
        ],
    ]) ?>

</div>
