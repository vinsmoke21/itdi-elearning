<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\RfMainService;

/**
 * RfMainServiceSearch represents the model behind the search form of `app\models\RfMainService`.
 */
class RfMainServiceSearch extends RfMainService
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'section', 'sample_type', 'sample_name', 'particulars', 'quantity'], 'integer'],
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
        $query = RfMainService::find();

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
            'id' => $this->id,
            'section' => $this->section,
            'sample_type' => $this->sample_type,
            'sample_name' => $this->sample_name,
            'particulars' => $this->particulars,
            'quantity' => $this->quantity,
        ]);

        return $dataProvider;
    }
}
