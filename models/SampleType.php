<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sample_type".
 *
 * @property int $id
 * @property int $sec_id
 * @property string $stype_code
 * @property string $stype_name
 * @property int $stype_status
 */
class SampleType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sample_type';
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
            [['sec_id', 'stype_code', 'stype_name', 'stype_status'], 'required'],
            [['sec_id', 'stype_status'], 'integer'],
            [['stype_code'], 'string', 'max' => 50],
            [['stype_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sec_id' => 'Sec ID',
            'stype_code' => 'Stype Code',
            'stype_name' => 'Stype Name',
            'stype_status' => 'Stype Status',
        ];
    }
    public static function getSampleType($cat_id)
    {
        $sampleType = self::find()
        ->select(['id', 'stype_name'])
        ->where(['sec_id' => $cat_id])
        ->asArray()
        ->all();

        return $sampleType;
    }
}
