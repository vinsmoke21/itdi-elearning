<?php

namespace app\models\backend;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\backend\Tblinquiry;

/**
 * TblinquirySearch represents the model behind the search form of `app\models\backend\Tblinquiry`.
 */
class TblinquirySearch extends Tblinquiry
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'contactnum'], 'integer'],
            [['name', 'industry', 'emails', 'details', 'suggestions'], 'safe'],
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
        $query = Tblinquiry::find();

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
            'contactnum' => $this->contactnum,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'industry', $this->industry])
            ->andFilterWhere(['like', 'emails', $this->emails])
            ->andFilterWhere(['like', 'details', $this->details])
            ->andFilterWhere(['like', 'suggestions', $this->suggestions]);

        return $dataProvider;
    }
}
