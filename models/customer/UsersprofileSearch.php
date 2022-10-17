<?php

namespace app\models\customer;

use yii\base\Model;
use yii\data\ActiveDataProvider;


/**
 * UserprofileSearch represents the model behind the search form of `app\models\backend\userprofile`.
 */
class UsersprofileSearch extends usersprofile
{
    /**
     * {@inheritdoc}
     */
    public function rules() 
    {
        return [
            [['id'], 'integer'],
            [['firstname', 'lastname', 'contactno', 'gender', 'agegroup', 'email', 'password', 'date_updated', 'sector'], 'safe'],
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
        $query = usersprofile::find();

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
            'date_updated' => $this->date_updated,
        ]);


        $query->andFilterWhere(['like', 'firstname', $this->firstname])
            ->andFilterWhere(['like', 'lastname', $this->lastname])
            ->andFilterWhere(['like', 'contactno', $this->contactno])
            ->andFilterWhere(['like', 'gender', $this->gender])
            ->andFilterWhere(['like', 'agegroup', $this->agegroup])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'sector', $this->sector]);

        return $dataProvider;
    }
}
