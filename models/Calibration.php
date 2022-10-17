<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "calibration".
 *
 * @property int $id
 * @property int $section_id
 * @property int $service_type_id
 * @property int $sample_type_id
 * @property string $sample_code
 * @property string $sample_name
 * @property string $sample_description
 * @property string $remarks
 * @property int $sample_onsite
 * @property int $sample_status
 */
class Calibration extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'calibration';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('system_db_services');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['section_id', 'service_type_id', 'sample_type_id', 'sample_code', 'sample_name', 'sample_description', 'remarks', 'sample_onsite', 'sample_status'], 'required'],
            [['section_id', 'service_type_id', 'sample_type_id', 'sample_onsite', 'sample_status'], 'integer'],
            [['sample_code'], 'string', 'max' => 50],
            [['sample_name', 'sample_description', 'remarks'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'section_id' => 'Section ID',
            'service_type_id' => 'Service Type ID',
            'sample_type_id' => 'Sample Type ID',
            'sample_code' => 'Sample Code',
            'sample_name' => 'Sample Name',
            'sample_description' => 'Sample Description',
            'remarks' => 'Remarks',
            'sample_onsite' => 'Sample Onsite',
            'sample_status' => 'Sample Status',
        ];
    }
        public static function getCalibration($cat_id, $subcat_id)
    {
        $sampleName = self::find()
        ->select(['id', 'sample_name'])
        ->where([
            'section_id' => $cat_id,
            'sample_type_id' => $subcat_id]
            )
        ->asArray()
        ->all();

        return $sampleName;
    }
}
