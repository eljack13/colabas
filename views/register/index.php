<?php

use app\models\Register;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;


/** @var yii\web\View $this */
/** @var app\models\registerSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */
/** @var app\models\Register $model */


$this->title = 'Crear cuenta';
$this->params['breadcrumbs'][] = $this->title;
?>
<link rel="stylesheet" href="../css/site.css">

<div class="register-index">



    <?php $form = ActiveForm::begin(['options' => ['class' => 'row g-3 needs-validation']]); ?>


  


        <div class="container-all">
         
                <div class="ctn-form">
                    <img src="../logo.png" alt="" class="logoo">
            

                    <h1 class="title">Registrarse</h1>

                    <?= $form->field($model, 'tbl_register_nombre')->textInput(['class' => 'inputpass', 'autocomplete' => 'off'])->label('Nombre de Usuario') ?>
                    <?= $form->field($model, 'tbl_register_email')->textInput(['class' => 'inputpass'])->label('Email') ?>
                    <?= $form->field($model, 'tbl_registro_password')->passwordInput(['class' => 'inputpass'])->label('Contraseña') ?>

                    <?= Html::submitButton('Registrarse', ['class' => 'input-button']) ?>

                    

                    <span class="text-footer">Ya tienes cuenta? <?= Html::a('Regístrate', ['site/login']) ?></span> 
                </div>


                <div class="ctn-text">
                    <div class="capa">
                        <h1 class="title-description">IDEAS LOCAS</h1>
                            <p class="text-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque, voluptatibus.</p>
                    </div>
                </div>
            </div>




    <?php ActiveForm::end(); ?>
</div>
</div>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');

    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Roboto", sans-serif;
        text-decoration: unset;
    }


    body{

        background: linear-gradient(90deg, #FEEBBB, #f5918c);
        padding: 20px;

    }

    .logoo {
        width: 300px;
        margin-left: 25%;
    }

    .container-all{
        width: 100%;
        max-width: 1000px;
        margin: auto;
        margin-top: 100px;
        display: flex;
        border-radius: 20px;
        overflow: hidden;
    }
  

    .ctn-form{

        width: 80%;
        padding: 40px;
        background: #f3f3f3;
    }

    .title{

        text-align: center;
        margin-top: 20px;
        font-weight: 300;
        color: #7a7a7a;
    }

    label{

        display: block;
        margin-top: 30px;
        font-size: 20px;
        font-weight: 300;
        color: #7a7a7a;
    }

   input{

        width: 100%;
        height: 30px;
        background: rgba(0, 0, 0, 0);
        border: 0;
        outline: 0;
        border-bottom: 1px solid rgba(0, 0, 0, 0.12); 
        color: #f5918c;
    }

    .input-button{
    width: 100%;
    height: 50px;
    margin-top: 60px;
    color: #fff;
    border: 0px;
    background: linear-gradient(90deg, #FEEBBB, #f5918c);
    font-weight: 300;
    cursor: pointer;
    font-size: 20px;
    margin-bottom: 30px;
    }

    


.input-button:hover{
    background: linear-gradient(90deg, #f5918c, #FEEBBB);
     animation: infinite 2s linear;
}

.text-footer{
    display: block;
    margin-top: 60px;
    text-align: center;
    color: #7a7a7a;
    font-weight: 300;
}


/* LADO DERECHO */

.ctn-text{
    width: 100%;
    background-image: url(../web/img1.jpg);
    background-position: center;
    background-size: cover;
    padding: 40px;
    position: relative;
}

.capa{
    width: 100%;
    height: 100%;
    position: absolute;
    top: 0;
    left: 0;
    background: linear-gradient(90deg, #fab143, #e2a448 );
    opacity: 0.9;
}

.title-description{
    position: relative;
    padding-left: 20px;
    top: 80px;
    color: #ffffff;
    font-weight: 500;
    font-size: 40px;
}

.text-description{
    position: relative;
    padding-left: 20px;
    top: 110px;
    color: #fff;
    font-size: 18px;
    font-weight: 300;
}

.logoo{
    width: 150px;
    display: block;
    margin: auto;

}

/* RESPONSIVE */

@media screen and (max-width: 768px) {
    .container-all {
        flex-direction: column;
        margin-top: 50px;
    }

    .ctn-form {
        width: 100%;
        padding: 20px;
    }

    .ctn-text {
        display: none; /* Esto oculta el lado derecho en pantallas pequeñas */
    }
}

 .container-all{ 
    border-radius:50px;
    width: 100%;
    max-width: 1000px;
    margin: auto;
    display: flex;
    overflow: hidden;
 }
</style>