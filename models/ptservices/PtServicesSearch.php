<?php

namespace app\models\ptservices\models;

use app\models\ptservices\PtServices;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;


/**
 * PtServicesSearch represents the model behind the search form about `app\modules\proficiencytesting\models\PtServices`.
 */
class PtServicesSearch extends PtServices
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'category_id', 'up_status'], 'integer'],
            [['year', 'pt_code', 'target_analytes', 'start_date', 'unit_quantity', 'price', 'details'], 'safe'],
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
        $query = PtServices::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'category_id' => $this->category_id,
            'up_status' => $this->up_status,
        ]);

        $query->andFilterWhere(['like', 'year', $this->year])
            ->andFilterWhere(['like', 'pt_code', $this->pt_code])
            ->andFilterWhere(['like', 'target_analytes', $this->target_analytes])
            ->andFilterWhere(['like', 'start_date', $this->start_date])
            ->andFilterWhere(['like', 'unit_quantity', $this->unit_quantity])
            ->andFilterWhere(['like', 'price', $this->price])
            ->andFilterWhere(['like', 'details', $this->details]);

        return $dataProvider;
    }
}
