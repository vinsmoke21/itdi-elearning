<?php

namespace app\models\customer;

use Yii;

/**
 * This is the model class for table "tbl_industry_type".
 *
 * @property int $id
 * @property string $industry_type
 */
class IndustryType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_industry_type';
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
            [['industry_type'], 'required'],
            [['industry_type'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'industry_type' => 'Industry Type',
        ];
    }
}
