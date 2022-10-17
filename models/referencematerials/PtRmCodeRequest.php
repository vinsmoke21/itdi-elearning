<?php
namespace app\models\referencematerials;

use Yii;

/**
 * This is the model class for table "pt_rm_code_request".
 *
 * @property int $id
 * @property int $request_id
 * @property int $pt_rm_id
 * @property int $amount
 * @property int $quantity
 * @property int $total_fee
 */
class PtRmCodeRequest extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pt_rm_code_request';
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
            [['request_id', 'pt_rm_id', 'amount', 'quantity', 'total_fee'], 'required'],
            [['request_id', 'pt_rm_id', 'amount', 'quantity', 'total_fee'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'request_id' => 'Request ID',
            'pt_rm_id' => 'Pt Rm ID',
            'amount' => 'Amount',
            'quantity' => 'Quantity',
            'total_fee' => 'Total Fee',
        ];
    }

    public function getMaterials()
    {
        return $this->hasOne(PtReferenceMaterials::className(), ['id' => 'pt_rm_id']);
    }
}
