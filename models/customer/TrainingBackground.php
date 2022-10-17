<?php

namespace app\models\customer;

use Yii;

/**
 * This is the model class for table "training_background".
 *
 * @property int $id
 * @property int $training_id
 * @property string $requirements
 */
class TrainingBackground extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%training_background}}';
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
            [['requirements'], 'required'],
            [['id'], 'integer'],
            [['requirements'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'requirements' => 'Training Background',
        ];
    }
    
}
