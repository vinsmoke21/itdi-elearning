<?php

namespace app\models\referencematerials;

use Yii;

/**
 * This is the model class for table "pt_reference_materials".
 *
 * @property int $id
 * @property string $prm_code
 * @property int $unit
 * @property string $quantity
 * @property int $price
 * @property string $image_details
 * @property string $pdf_details
 * @property int $stocks_left
 * @property string $date_generated
 * @property string $year_generated
 * @property string $tsr_number
 * @property int $counter
 */
class PtReferenceMaterials extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $image;
    public $pdf;

    public static function tableName()
    {
        return 'pt_reference_materials';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('itdidb_pt_services');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['prm_code', 'unit', 'quantity', 'price', 'image_details', 'pdf_details', 'stocks_left', 'date_generated', 'year_generated', 'tsr_number', 'counter', 'actual_stocks'], 'safe'],
            [['quantity', 'price', 'stocks_left', 'counter', 'up_status', 'actual_stocks'], 'integer'],
            [['prm_code'], 'string', 'max' => 255],
            [['image_details', 'pdf'], 'file', 'extensions' => 'png, jpg, jpeg', 'on' => 'create'],
            [['pdf_details'], 'file', 'extensions' => 'pdf', 'on' => 'create'],
            [['unit', 'date_generated', 'year_generated', 'tsr_number'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'prm_code' => 'PRM Code',
            'unit' => 'Unit',
            'quantity' => 'Quantity',
            'price' => 'Price',
            'image_details' => 'Image Details',
            'pdf_details' => 'Pdf Details',
            'stocks_left' => 'Final Stocks Left',
            'actual_stocks' => 'Actual Stocks',
            'date_generated' => 'Date Generated',
            'year_generated' => 'Year Generated',
            'tsr_number' => 'TSR Number',
            'counter' => 'Counter',
        ];
    }
}
