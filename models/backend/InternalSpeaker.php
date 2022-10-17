<?php

namespace app\models\backend;

use app\models\lab\Division;
use Yii;

/**
 * This is the model class for table "internal_speaker".
 *
 * @property int $id
 * @property int $division_id
 * @property int $plantilla_id
 * @property int $designation_id
 * @property int $training_id
 */
class InternalSpeaker extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'internal_speaker';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('itdidb_cportal');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['division_id', 'plantilla_id', 'designation_id', 'training_id'], 'safe'],
            [['division_id', 'plantilla_id', 'designation_id', 'training_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'division_id' => 'Division ID',
            'plantilla_id' => 'Plantilla ID',
            'designation_id' => 'Designation ID',
            'training_id' => 'Training ID',
        ];
    }

    public function getCheckB(){
        return $this->hasOne(Trainings::className(),['id' => 'training_id']);
    }

    public function getDivision(){
        return $this->hasOne(Division::className(),['id' => 'division_id']);
    }

    public function getPlantilla(){
        return $this->hasOne(Plantilla::className(),['id' => 'plantilla_id']);
    }

    public function getDesignation(){
        return $this->hasOne(Designation::className(),['id' => 'designation_id']);
    }

    public function getInternal(){
        return $this->hasOne(Trainings::className(),['id' => 'training_id']);
    }

}
