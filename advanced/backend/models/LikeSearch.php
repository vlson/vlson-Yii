<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Like;

/**
 * LikeSearch represents the model behind the search form of `common\models\Like`.
 */
class LikeSearch extends Like
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
        $query = Like::find();

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
        if(isset($this->id)){
            $query->andFilterWhere([
                'id' => $this->id,
            ]);
        }
        if(isset($this->art_id)){
            $query->andFilterWhere([
                'art_id' => $this->art_id,
            ]);
        }
        if(isset($this->status) && $this->status != 999){
            $query->andFilterWhere([
                'status' => $this->status,
            ]);
        }

        if(isset($this->ip)){
            $query->andFilterWhere(['like', 'ip', $this->ip]);
        }

        return $dataProvider;
    }
}
