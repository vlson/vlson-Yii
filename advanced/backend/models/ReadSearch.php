<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Read;

/**
 * ReadSearch represents the model behind the search form of `common\models\Read`.
 */
class ReadSearch extends Read
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'art_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['ip'], 'safe'],
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
        $query = Read::find();

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
        if($this->art_id){
            $query->andFilterWhere([
                'art_id' => $this->art_id,
            ]);
        }
        if($this->status && $this->status != 999){
            $query->andFilterWhere([
                'status' => $this->status,
            ]);
        }

        if($this->ip){
            $query->andFilterWhere(['like', 'ip', $this->ip]);
        }

        return $dataProvider;
    }
}
