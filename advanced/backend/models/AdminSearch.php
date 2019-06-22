<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Admin;

/**
 * AdminSearch represents the model behind the search form of `app\models\Admin`.
 */
class AdminSearch extends Admin
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'role', 'status'], 'integer'],
            [['username', 'auth_key', 'password_hash', 'password_reset_token', 'email', 'mobile', 'created_at', 'updated_at'], 'safe'],
        ];
    }

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
        $query = Admin::find();

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
        if($this->id){
            $query->andFilterWhere([
                'id' => $this->id,
            ]);
        }
        if($this->role && $this->role != 999){
            $query->andFilterWhere([
                'role' => $this->role,
            ]);
        }
        if($this->status && $this->status != 999){
            $query->andFilterWhere([
                'status' => $this->status,
            ]);
        }

        if($this->username){
            $query->andFilterWhere(['like', 'username', $this->username]);
        }
        if($this->email){
            $query->andFilterWhere(['like', 'email', $this->email]);
        }
        if($this->mobile){
            $query->andFilterWhere(['like', 'mobile', $this->mobile]);
        }

        return $dataProvider;
    }
}
