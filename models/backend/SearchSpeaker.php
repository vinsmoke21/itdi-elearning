<?php

namespace app\modules\webinar\models;

use app\models\backend\Speaker;
use yii\base\Model;
use yii\data\ActiveDataProvider;


/**
 * SpeakerSearch represents the model behind the search form of `app\modules\webinar\models\Speaker`.
 */
class SearchSpeaker extends Speaker
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['speaker'], 'safe'],
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
        $query = Speaker::find();
        // var_dump($query);die;

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
            // 'training_id' => $this->training_id,
            // 'seminar_id' => $this->seminar_id,
        ]);

        $query->andFilterWhere(['like', 'speaker', $this->speaker]);
         

        return $dataProvider;
    }
}
