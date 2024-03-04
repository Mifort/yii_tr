<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Translators;
use yii\helpers\VarDumper;

/**
 * TranslatorsSearch represents the model behind the search form of `common\models\Translators`.
 */
class TranslatorsSearch extends Translators
{
    public $type_wa;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['t_id'], 'integer'],
            [['t_name', 'type_wa'], 'safe'],
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

//        $query = Translators::find();
        $query = Translators::find()->joinWith( [
            'typeWa'
        ] );
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'attributes' => [
                    't_id' => [
                        'asc' => [ 't_id' => SORT_ASC ],
                        'desc' => [ 't_id' => SORT_DESC ],
                    ],
                    't_name' => [
                        'asc' => [ 't_name' => SORT_ASC ],
                        'desc' => [ 't_name' => SORT_DESC ],
                    ],
                    'type_wa' => [
                        'asc' => [ 'wa_name' => SORT_ASC ],
                        'desc' => [ 'wa_name' => SORT_DESC ],
                    ],
                ]
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            't_id' => $this->t_id,
            't_wa' => $this->t_wa,
        ]);

        $query->andFilterWhere(['like', 't_name', $this->t_name]);
        $query->andFilterWhere( [ 'like', 'wa_name', $this->type_wa ] );
        return $dataProvider;
    }
}
