<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Node;

/**
 * NodeSearch represents the model behind the search form of `app\models\Node`.
 */
class NodeSearch extends Node
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['node_id', 'level', 'p_id'], 'integer'],
            [['node_name', 'node_title', 'sort', 'status', 'remark'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Node::find();

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
            'node_id' => $this->node_id,
            'level' => $this->level,
            'p_id' => $this->p_id,
        ]);

        $query->andFilterWhere(['like', 'node_name', $this->node_name])
            ->andFilterWhere(['like', 'node_title', $this->node_title])
            ->andFilterWhere(['like', 'sort', $this->sort])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'remark', $this->remark]);

        return $dataProvider;
    }
}
