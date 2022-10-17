<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rf_sample_details".
 *
 * @property int $id
 * @property int $cal_id
 * @property int $part_id
 * @property string $customer_name
 * @property string $address
 * @property string $contact
 * @property string $purpose
 * @property int $customer_type
 * @property int $industry_type
 * @property string $requesting_official
 * @property string $position
 * @property string $sample_brought_by
 * @property string $equipment_description
 * @property string $special_request
 */
class RfSampleDetails extends \yii\db\ActiveRecord
{

     public $captcha;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rf_sample_details';
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
            [['cal_id', 'part_id', 'quantity', 'customer_name', 'email', 'address', 'contact', 'purpose', 'customer_type', 'industry_type', 'requesting_official', 'position', 'sample_brought_by', 'equipment_description', 'special_request'], 'required'],
            // ['captcha', 'captcha'],
            [['cal_id', 'part_id', 'customer_type', 'industry_type', 'quantity'], 'integer'],
            [['customer_name', 'address', 'contact', 'purpose', 'email', 'requesting_official', 'position', 'sample_brought_by', 'equipment_description', 'special_request'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cal_id' => 'Calibration',
            'part_id' => 'Particulars',
            'quantity' => 'Quantity',
            'customer_name' => 'Customer Name',
            'email' => 'Email Address',
            'address' => 'Address',
            'contact' => 'Contact',
            'purpose' => 'Purpose',
            'customer_type' => 'Customer Type',
            'industry_type' => 'Industry Type',
            'requesting_official' => 'Requesting Official',
            'position' => 'Position',
            'sample_brought_by' => 'Sample Brought By',
            'equipment_description' => 'Equipment Description',
            'special_request' => 'Special Request',
            'captcha'=> 'Verification Code',
        ];
    }

}
