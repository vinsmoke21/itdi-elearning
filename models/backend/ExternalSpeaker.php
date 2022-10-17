<?php

namespace app\models\backend;

use Yii;

/**
 * This is the model class for table "external_speaker".
 *
 * @property int $id
 * @property int $speaker_id
 * @property string $position_id
 * @property int $training_id
 */
class ExternalSpeaker extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'external_speaker';
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
            [['speaker_id', 'position_id', 'training_id'], 'safe'],
            [['speaker_id', 'training_id'], 'integer'],
           
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'speaker_id' => 'Speaker ID',
            'position_id' => 'Designation',
            'training_id' => 'Training ID',
        ];
    }

    public function getSpeak(){
        return $this->hasOne(Speaker::className(),['id' => 'speaker_id']);
    }

    public function getExternal(){
        return $this->hasOne(External::className(),['id' => 'position_id']);
    }

}
