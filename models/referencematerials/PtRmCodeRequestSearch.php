<?php

namespace app\models\referencematerials;

use yii\base\Model;
use yii\data\ActiveDataProvider;


/**
 * PtRmCodeRequestSearch represents the model behind the search form of `app\modules\proficiencytesting\models\referencematerials\PtRmCodeRequest`.
 */
class PtRmCodeRequestSearch extends PtRmCodeRequest
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'request_id', 'pt_rm_id', 'amount', 'quantity', 'total_fee'], 'integer'],
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
        $query = PtRmCodeRequest::find()
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
            'request_id' => $this->request_id,
            'pt_rm_id' => $this->pt_rm_id,
            'amount' => $this->amount,
            'quantity' => $this->quantity,
            'total_fee' => $this->total_fee,
        ]);

        return $dataProvider;
    }
}
