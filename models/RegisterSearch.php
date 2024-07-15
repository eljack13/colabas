<?php

namespace app\models;

use yii\data\ActiveDataProvider;
use app\models\Register;
use Yii;
use yii\base\Model;

/**
 * RegisterSearch represents the model behind the search form of `app\models\Register`.
 */
class RegisterSearch extends Register
{
    public $tbl_register_nombre;
    public $tbl_register_email;
    public $tbl_registro_password;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tbl_register_id'], 'integer'],
            [['tbl_register_nombre', 'tbl_register_email', 'tbl_registro_password', 'tbl_registro_fecha'], 'safe'],
            [['tbl_register_nombre', 'tbl_register_email', 'tbl_registro_password'], 'required'],
            ['email' , 'email']
        ];
    }
    
    /**
     * {@inheritdoc}
     */
     /**
        * {@inheritdoc}
        */  
    
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }


    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Register::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        
        // grid filtering conditions
        $query->andFilterWhere([
            'tbl_register_id' => $this->tbl_register_id,
            'tbl_registro_fecha' => $this->tbl_registro_fecha,
        ]);

        $query->andFilterWhere(['like', 'tbl_register_nombre', $this->tbl_register_nombre])
            ->andFilterWhere(['like', 'tbl_register_email', $this->tbl_register_email])
            ->andFilterWhere(['like', 'tbl_registro_password', $this->tbl_registro_password]);

        return $dataProvider;
    }
}
