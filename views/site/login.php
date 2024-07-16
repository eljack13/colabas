<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

/** @var app\models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Iniciar sesión';

?>
<div class="site-login">
 

<div class="register-index">
<body>
    <div class="container-all">

    <div class="ctn-text">
                    <div class="capa">
                        <h1 class="title-description">IDEAS LOCAS</h1>
                            <p class="text-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque, voluptatibus.</p>
                    </div>
                </div>

        <div class="ctn-form">
        <h1 class="title">Iniciar Sesión</h1>
        <img src="logo.png" alt="" class="logoo">
            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'fieldConfig' => [
                    'template' => "{label}\n{input}\n{error}",
                    'labelOptions' => ['class' => 'col-lg-1 col-form-label mr-lg-3'],
                    'inputOptions' => ['class' => 'col-lg-3 form-control'],
                    'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'],
                ],
            ]); ?>

            <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'class' => 'inputpass']) ?>

            <?= $form->field($model, 'password')->passwordInput(['class' => 'inputpass']) ?>

            <?= $form->field($model, 'rememberMe')->checkbox(['template' => "<div class=\"custom-control custom-checkbox\">{input} {label}</div><div class=\text-secondary\">{error}</div>",]) ?>
           <span class="primary-text mb-2 col-lg-8">¿No tienes una cuenta? <?= Html::a('Regístrate', ['register/index']) ?></span>

            <div class="form-group">
                <div>
                    <?= Html::submitButton('Login', ['class' => 'input-button', 'name' => 'login-button']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>

        
                </div>  
        </div>
    </div>


    </div>
</body>

</div>

<style>
    .register-index{ 
        margin-top: -1.25%;
    }
    

    body{ 
        background: linear-gradient(90deg, #FEEBBB, #f5918c);
    }

</style>