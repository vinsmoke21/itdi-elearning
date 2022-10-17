<?php

namespace app\models\ptservices;

use app\models\backend\Pt_categories;
use Yii;

/**
 * This is the model class for table "pt_services".
 *
 * @property int $id
 * @property string $year
 * @property string $pt_code
 * @property string $target_analytes
 * @property string $start_date
 * @property string $unit_quantity
 * @property string $price
 * @property string $details
 * @property int $category_id
 */
class PtServices extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */

    public $file;

    public static function tableName()
    {
        return 'pt_services';
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
            [['year', 'pt_code', 'target_analytes', 'start_date', 'unit_quantity', 'price', 'details', 'category_id', 'up_status'], 'safe'],
            [['category_id', 'up_status'], 'integer'],
            [['price'], 'double'],
            [['details'], 'file', 'skipOnEmpty' => 'false', 'extensions' => 'png, jpg, jpeg', 'on' => 'create'],
            [['year', 'pt_type_code', 'pt_code', 'target_analytes', 'filename', 'start_date', 'unit_quantity'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'year' => 'Year',
            'pt_code' => 'Proficiency Testing Code',
            'target_analytes' => 'Target Analytes',
            'start_date' => 'Start Date',
            'unit_quantity' => 'Unit Quantity',
            'price' => 'Price',
            'details' => 'Poster',
            'category_id' => 'Category',
        ];
    }

    public function getCategory(){
        {
            return $this->hasOne(Pt_categories::className(), ['id' => 'category_id']);
        }
    }
    public function getJoin(){
        {
            return $this->hasOne(PtRequest::className(), ['id' => 'pt_services_id']);
        }
    }
}
