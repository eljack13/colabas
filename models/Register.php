<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "register".
 *
 * @property int $tbl_register_id
 * @property string $tbl_register_nombre
 * @property string $tbl_register_email
 * @property string $tbl_registro_password
 * @property string $tbl_registro_fecha
 */
class Register extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'register';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tbl_register_nombre', 'tbl_register_email', 'tbl_registro_password'], 'required'],
            [['tbl_registro_fecha'], 'safe'],
            [['tbl_register_nombre', 'tbl_register_email', 'tbl_registro_password'], 'string', 'max' => 255],
            [['tbl_register_email'], 'email'],
            [[ 'tbl_registro_password'], 'string', 'min' => 8],
            [['tbl_registro_password'], 'match', 'pattern' => '/^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])(?=.*[^\w\s]).{8,}$/', 'message' => 'La contraseña debe contener al menos 1 número, 1 letra mayúscula, 1 letra minúscula y 1 caracter especial.'],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'tbl_register_id' => 'ID',
            'tbl_register_nombre' => 'Nombre Completo',
            'tbl_register_email' => 'Correo Electrónico',
            'tbl_registro_password' => 'Contraseña',
            'tbl_registro_fecha' => 'Tbl Registro Fecha',
        ];
    }
    public function contact($email)
    {
        return Yii::$app->mailer->compose()
            ->setTo($email)
            ->setFrom([$this->email => $this->name])
            ->setSubject($this->subject)
            ->setTextBody($this->body)
            ->send();
    }
}