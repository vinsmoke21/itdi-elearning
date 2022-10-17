<?php

namespace app\models\customer;

use Yii;

/**
 * This is the model class for table "tbl_customer_type".
 *
 * @property int $id
 * @property string $customer_type
 */
class Region extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_addr_region';
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
            [['name', 'code', 'country_id'], 'required'],
            [['id'], 'integer'],
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
            'country_id' => 'Country ID',
            'name' => 'Name',
            'code' => 'Code',
        ];
    }

    public static function getRegion()
    {
        return self::find()->select(['code', 'id'])->indexBy('id')->column();
    }
}
