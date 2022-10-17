<?php

namespace app\models\customer;

use Yii;

/**
 * This is the model class for table "tbl_customer_type".
 *
 * @property int $id
 * @property string $customer_type
 */
class CustomerType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_customer_type';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('itdidb_customer');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['customer_code','customer_name','location','contact','email','date_registered'], 'required'],
            [['id','customer_type_id','industry_type_id','industry_category_id','city_id','province_id','region_id','isSync'], 'integer'],
            // [['customer_type'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'customer_type_id' => 'Customer Id',
            'industry_type_id' => 'Industry Type Id',
            'industry_category_id' => 'Industry Category Id',
            'city_id' => 'City Id',
            'province_id' => 'Province Id',
            'region_id' => 'Region Id',
            'isSync' => 'Sync',
            'customer_code' => 'Customer Code',
            'customer_name' => 'Customer Name',
            'location' => 'Location',
            'contact' => 'Contact',
            'email' => 'Email',
            'date_registered' => 'Customer Registerd',
            'customer_code' => 'Customer Code',
        ];
    }
}
