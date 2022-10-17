<?php

namespace app\models\backend;
use yii\captcha\Captcha;
use Yii;

/**
 * This is the model class for table "emails".
 *
 * @property int $id
 * @property string $pt_code_id
 * @property string $company_name
 * @property string $contact_person
 * @property string $email_address
 * @property string $tel_no
 * @property string $fax_no
 * @property string $date_inquiry
 * @property string $mode_of_payment
 */
class Pt_inquiry extends \yii\db\ActiveRecord
{


    // public $captcha;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'itdidb_pt.pt_inquiry';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('itdidb_pt');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pt_code_id', 'company_name'], 'required'],
            [['pt_code_id'], 'integer'],
            [['date_inquiry'], 'safe'],
            [['company_name', 'contact_person', 'email_address', 'fax_no','address_1','address_2'
            ,'city','postal_code','country','name','position','delivery_address'], 'string', 'max' => 255],
            [['tel_no','telephone_number'], 'string', 'max' => 50],
        ];
    }


     /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pt_code_id' => 'Pt Code ID',
            'company_name' => 'Company Name',
            'contact_person' => 'Contact Person',
            'email_address' => 'Email Address',
            'tel_no' => 'Tel No',
            'fax_no' => 'Fax No',
            'date_inquiry' => 'Date Inquiry',
            'address_1' => 'Address Line 1',
            'address_2' => 'Address Line 2',
            'city' => 'City',
            'postal_code' => 'Postal Code',
            'country' => 'Country',
            'name' => 'Name',
            'position' => 'Position',
            'telephone_number' => 'Telephone Number',
            'delivery_address' => 'Delivery Address',
        ];
    }

    // public function getPtMaterials()
    // {
    //     return $this->hasOne(Pt_materials::className(), ['id' => 'pt_code']);
    // }

    public function getPt_inquiry()
    {
        return $this->hasOne(Pt_inquiry::className(), ['id' => 'pt_code_id']);
    }
}
