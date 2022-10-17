<?php

namespace app\models\referencematerials;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\referencematerials\PtReferenceMaterials;

/**
 * PtReferenceMaterialsSearch represents the model behind the search form of `app\modules\proficiencytesting\models\referencematerials\PtReferenceMaterials`.
 */
class PtReferenceMaterialsSearch extends PtReferenceMaterials
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'unit', 'price', 'stocks_left', 'counter'], 'integer'],
            [['prm_code', 'quantity', 'image_details', 'pdf_details', 'date_generated', 'year_generated', 'tsr_number'], 'safe'],
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
        $query = PtReferenceMaterials::find()
        ->orderBy(['id' => SORT_DESC]);

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
            'unit' => $this->unit,
            'price' => $this->price,
            'stocks_left' => $this->stocks_left,
            'counter' => $this->counter,
        ]);

        $query->andFilterWhere(['like', 'prm_code', $this->prm_code])
            ->andFilterWhere(['like', 'quantity', $this->quantity])
            ->andFilterWhere(['like', 'image_details', $this->image_details])
            ->andFilterWhere(['like', 'pdf_details', $this->pdf_details])
            ->andFilterWhere(['like', 'date_generated', $this->date_generated])
            ->andFilterWhere(['like', 'year_generated', $this->year_generated])
            ->andFilterWhere(['like', 'tsr_number', $this->tsr_number]);

        return $dataProvider;
    }
}
