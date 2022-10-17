<?php

namespace app\models\customer;

use Yii;

/**
 * This is the model class for table "tbl_customer_type".
 *
 * @property int $id
 * @property string $customer_type
 */
class Province extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_addr_province';
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
            [['name'], 'required'],
            [['id', 'regionId'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'regionId' => 'Region ID',
            'name' => 'Name',
        ];
    }

    public static function getProvinceList($cat_id)
    {
        $province = self::find()
            ->select(['id', 'name'])
            ->where(['regionId' => $cat_id])
            ->asArray()
            ->all();

        return $province;
    }
}
