<?php

namespace app\models\backend;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\backend\technologies;

/**
 * TechtransferSearch represents the model behind the search form of `app\models\backend\techtransfer`.
 */
class TechnologiesSearch extends technologies
{
    /**
     * {@inheritdoc}
     */

    public static function tableName()
    {
        return 'itdidb_cportal.technologies';
    }

   public function rules()
    {
        return [
            [['id'], 'integer'],
            [['title', 'description', 'pdf_file', 'upload_date', 'recorded_by', 'edited_by'], 'safe'],
        ];
    }


    /**
     * @inheritdoc
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
        $query = Technologies::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['id' => SORT_DESC]],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'upload_date' => $this->upload_date,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'pdf_file', $this->pdf_file])
            ->andFilterWhere(['like', 'recorded_by', $this->recorded_by])
            ->andFilterWhere(['like', 'edited_by', $this->edited_by]);

        return $dataProvider;
    }
}
