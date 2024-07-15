<?php

namespace app\models;
use Yii;

class User extends \yii\base\BaseObject implements \yii\web\IdentityInterface
{
  //  public $id;
  //  public $username;
  //  public $password;
    public $authKey;
    public $accessToken;
    public $tbl_register_id;
    public $tbl_register_nombre;
    public $tbl_register_email;
    public $tbl_registro_password;
    public $tbl_registro_fecha;

   


    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        $user = Register::find()
        ->where("tbl_register_id=:idUser", ["idUser" => $id])
        ->one();
  
      return isset($user) ? new static($user) : null;
  
    }
    


    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
       /* foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;   */
 }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        $users = Register::find()
        ->all();
  
      foreach ($users as $user) {
        if (strcasecmp($user->tbl_register_nombre, $username) === 0) {

           $tbl_register_id  = $user->tbl_register_id ;

           $tbl_register_nombre = $user->tbl_register_nombre;
      
           $tbl_register_email = $user->tbl_register_email;
      
           $tbl_registro_password = $user->tbl_registro_password;
      
           $tbl_registro_fecha = $user->tbl_registro_fecha;
      
          return new static($user);
        }
      }
  
      return null;
    }

    

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->tbl_register_id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->getSecurity()->validatePassword($password, $this->tbl_registro_password);
    }
}