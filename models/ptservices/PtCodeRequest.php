<?php

namespace app\models\ptservices;


use app\models\ptservices\PtCategories;
use Yii;

/**
 * This is the model class for table "pt_code_request".
 *
 * @property int $id
 * @property int $categories_id
 * @property int $code_id
 * @property string $amount
 * @property int $request_id
 */
class PtCodeRequest extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pt_code_request';
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
            [['categories_id', 'code_id', 'amount', 'request_id'], 'safe'],
            [['categories_id', 'code_id', 'request_id'], 'integer'],
            [['amount'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'categories_id' => 'Categories ID',
            'code_id' => 'Code ID',
            'amount' => 'Amount',
            'request_id' => 'Request ID',
        ];
    }
    public function getPtRequest()
    {
        return $this->hasOne(PtRequest::className(), ['id' => 'request_id']);
    }

    public function getCategory()
    {
        return $this->hasOne(PtCategories::className(), ['id' => 'categories_id']);
    }

    public function getServices()
    {
        return $this->hasOne(PtServices::className(), ['id' => 'code_id']);
    }
}
