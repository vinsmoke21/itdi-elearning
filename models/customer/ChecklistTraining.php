<?php

namespace app\models\customer;

use app\models\backend\Trainings;
use Yii;

/**
 * This is the model class for table "checklist_training".
 *
 * @property int $id
 * @property int $training_background_id
 * @property int $training_id
 */
class ChecklistTraining extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'checklist_training';
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
            [['training_background_id', 'training_id'], 'safe'],
            [['training_background_id', 'training_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'training_background_id' => '',
            'training_id' => 'Training ID',
        ];
    }

    public function getBackground()
    {
        return $this->hasOne(TrainingBackground::classname(), ['id' => 'training_background_id']);
    }

}
