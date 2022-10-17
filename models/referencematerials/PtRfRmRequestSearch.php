<?php

namespace app\models\referencematerials;

use app\models\referencematerials\PtRequest;
use yii\base\Model;
use yii\data\ActiveDataProvider;


/**
 * PtRfRmRequestSearch represents the model behind the search form of `app\modules\proficiencytesting\models\PtRfRequest`.
 */
class PtRfRmRequestSearch extends PtRfRequest
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id',  'validated'], 'integer'],
            [['transaction_number', 'company_name', 'address_1', 'address_2', 'city', 'postal_code', 'country', 'email_address', 'tel_no', 'fax_no', 'mode_of_payment', 'name', 'position', 'delivery_address', 'date_inquiry'], 'safe'],
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
        $query = PtRfRequest::find()->orderBy(['id' => SORT_DESC])->where(['validated' => 0])->andWhere(['transaction_type' => 2]);

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
            'date_inquiry' => $this->date_inquiry,
            'validated' => $this->validated,
        ]);

        $query->andFilterWhere(['like', 'transaction_number', $this->transaction_number])
            ->andFilterWhere(['like', 'company_name', $this->company_name])
            ->andFilterWhere(['like', 'address_1', $this->address_1])
            ->andFilterWhere(['like', 'address_2', $this->address_2])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'postal_code', $this->postal_code])
            ->andFilterWhere(['like', 'country', $this->country])
            ->andFilterWhere(['like', 'email_address', $this->email_address])
            ->andFilterWhere(['like', 'tel_no', $this->tel_no])
            ->andFilterWhere(['like', 'fax_no', $this->fax_no])
            ->andFilterWhere(['like', 'mode_of_payment', $this->mode_of_payment])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'position', $this->position])
            ->andFilterWhere(['like', 'delivery_address', $this->delivery_address]);

        return $dataProvider;
    }
}
