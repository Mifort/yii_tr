<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\WorkingActivity;

/**
 * WorkingActivitySearch represents the model behind the search form of `common\models\WorkingActivity`.
 */
class WorkingActivitySearch extends WorkingActivity
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['wa_id'], 'integer'],
            [['wa_name'], 'safe'],
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
        $query = WorkingActivity::find();

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
            'wa_id' => $this->wa_id,
        ]);

        $query->andFilterWhere(['like', 'wa_name', $this->wa_name]);

        return $dataProvider;
    }
}
