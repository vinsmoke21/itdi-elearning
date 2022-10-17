<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "particulars".
 *
 * @property int $id
 * @property int $cal_id
 * @property string $range_capacity
 * @property string $method
 * @property string $reference
 * @property string $description
 * @property int $fee
 * @property int $status
 * @property int $count_of_sample
 * @property int $same_range_desc
 */
class Particulars extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'particulars';
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
            [['cal_id', 'range_capacity', 'method', 'reference', 'description', 'fee', 'status', 'count_of_sample', 'same_range_desc'], 'required'],
            [['cal_id', 'fee', 'status', 'count_of_sample', 'same_range_desc'], 'integer'],
            [['range_capacity', 'method', 'reference', 'description'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cal_id' => 'Cal ID',
            'range_capacity' => 'Range Capacity',
            'method' => 'Method',
            'reference' => 'Reference',
            'description' => 'Description',
            'fee' => 'Fee',
            'status' => 'Status',
            'count_of_sample' => 'Count Of Sample',
            'same_range_desc' => 'Same Range Desc',
        ];
    }
            public static function getParticulars( $snsubcat_id)
    {
        $sampleName = self::find()
        ->select(['id', 'range_capacity'])
        ->where([
            'cal_id' => $snsubcat_id]
            )
        ->asArray()
        ->all();

        return $sampleName;
    }
}
