<?php

namespace app\modules\backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\backend_webinar\models\Tbltrainings;




/**
 * TbltrainingsSearch represents the model behind the search form of `app\modules\backend_webinar\models\Tbltrainings`.
 */
class TbltrainingsSearch extends Tbltrainings
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['category_id', 'thumbnailpath', 'filename', 'created_at', 'title', 'description', 'scheduledate', 'scheduletime', 'nameofspeaker', 'designation', 'payment', 'status'], 'safe'],
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
        $query = Tbltrainings::find();

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
        ]);

        $query->andFilterWhere(['like', 'category_id', $this->category_id])
            ->andFilterWhere(['like', 'thumbnailpath', $this->thumbnailpath])
            ->andFilterWhere(['like', 'filename', $this->filename])
            ->andFilterWhere(['like', 'created_at', $this->created_at])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'scheduledate', $this->scheduledate])
            ->andFilterWhere(['like', 'scheduletime', $this->scheduletime])
            ->andFilterWhere(['like', 'nameofspeaker', $this->nameofspeaker])
            ->andFilterWhere(['like', 'designation', $this->designation])
            ->andFilterWhere(['like', 'payment', $this->payment])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
