<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rf_main_service".
 *
 * @property int $id
 * @property int $section
 * @property int $sample_type
 * @property int $sample_name
 * @property int $particulars
 */
class RfMainService extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rf_main_service';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('system_db_rf');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['section', 'sample_type', 'sample_name', 'particulars', 'quantity'], 'required'],
            [['section', 'sample_type', 'sample_name', 'particulars', 'quantity'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'section' => 'Section',
            'sample_type' => 'Sample Type',
            'sample_name' => 'Sample Name',
            'particulars' => 'Particulars',
            'quantity' => 'Quantity',
        ];
    }

    public function getService()
    {
        return $this->hasOne(RfMainService::className(), ['id' => 'particulars']);
    }

    public function getCalibration()
    {
        return $this->hasOne(Calibration::class, ['id' => 'sample_name']);
    }
    
}
