<?php

namespace app\models\referencematerials;

use Yii;



/**
 * This is the model class for table "pt_request".
 *
 * @property int $id
 * @property int $pt_code_id
 * @property string $company_name
 * @property string $address_1
 * @property string $address_2
 * @property string $city
 * @property string $postal_code
 * @property string $country
 * @property string $email_address
 * @property string $tel_no
 * @property string $fax_no
 * @property string $mode_of_payment
 * @property string $name
 * @property string $position
 * @property string $delivery_address
 * @property string $date_inquiry
 */
class PtRfRequest extends \yii\db\ActiveRecord
{
    public $buyQuantity;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pt_rf_request';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('itdidb_pt_rf');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['company_name', 'address_1','postal_code', 'country', 'mode_of_payment', 'name', 'position', 'delivery_address', 'date_inquiry','email_address'], 'required'],
            [[ 'validated','id','transaction_type','buyQuantity'], 'integer'],
            [['date_inquiry',], 'required'],
            [['buyQuantity','address_2'], 'safe'],
            [['company_name', 'address_1', 'address_2', 'city', 'postal_code', 'country', 'email_address', 'fax_no', 'name', 'position', 'delivery_address'], 'string', 'max' => 255],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'company_name' => 'Company Name',
            'address_1' => 'Address 1',
            'address_2' => 'Address 2',
            'city' => 'City',
            'postal_code' => 'Postal Code',
            'country' => 'Country',
            'email_address' => 'Email Address',
            'tel_no' => 'Tel No',
            'fax_no' => 'Fax No',
            'mode_of_payment' => 'Mode Of Payment',
            'name' => 'Name',
            'position' => 'Position',
            'delivery_address' => 'Delivery Address',
            'date_inquiry' => 'Date Inquiry',
        ];
    }


    
}