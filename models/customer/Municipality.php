<?php

namespace app\models\customer;

use Yii;

/**
 * This is the model class for table "municipality".
 *
 * @property int $id
 * @property int $regionId
 * @property int $provinceId
 * @property string $name
 * @property int|null $district
 */
class Municipality extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_addr_municipality_city';
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
            [['regionId', 'provinceId', 'name'], 'required'],
            [['regionId', 'provinceId', 'district'], 'integer'],
            [['name'], 'string', 'max' => 100],
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
            'provinceId' => 'Province ID',
            'name' => 'Name',
            'district' => 'District',
        ];
    }
    public static function getMunicipalityList($cat_id, $subcat_id)
    {
        $municipality = self::find()
        ->select(['id', 'name'])
        ->where(['regionId' => $cat_id,'provinceId' => $subcat_id])
        ->asArray()
        ->all();

        return $municipality;
    }
}
