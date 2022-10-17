<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\RfSampleDetails;

/**
 * RfSampleDetailsSearch represents the model behind the search form of `app\models\RfSampleDetails`.
 */
class RfSampleDetailsSearch extends RfSampleDetails
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'cal_id', 'part_id', 'customer_type', 'industry_type'], 'integer'],
            [['customer_name', 'address', 'contact', 'purpose', 'requesting_official', 'position', 'sample_brought_by', 'equipment_description', 'special_request'], 'safe'],
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
        $query = RfSampleDetails::find();

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
            'cal_id' => $this->cal_id,
            'part_id' => $this->parti_id,
            'customer_type' => $this->customer_type,
            'industry_type' => $this->industry_type,
        ]);

        $query->andFilterWhere(['like', 'customer_name', $this->customer_name])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'contact', $this->contact])
            ->andFilterWhere(['like', 'purpose', $this->purpose])
            ->andFilterWhere(['like', 'requesting_official', $this->requesting_official])
            ->andFilterWhere(['like', 'position', $this->position])
            ->andFilterWhere(['like', 'sample_brought_by', $this->sample_brought_by])
            ->andFilterWhere(['like', 'equipment_description', $this->equipment_description])
            ->andFilterWhere(['like', 'special_request', $this->special_request]);

        return $dataProvider;
    }
}
