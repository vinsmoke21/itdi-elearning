<?php

namespace app\models\backend;

// use app\models\backend\Category;
use Yii;
// use app\models\backend\Technologies;

/**
 * This is the model class for table "techtransfer".
 *
 * @property int $id
 * @property int $pt_code
 * @property string $analyte_matrix
 * @property string $concentration_range
 * @property string $fee
 * @property string $image
 */
class Pt_materials extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    // public $file;

    public static function tableName()
    {
        return 'itdidb_pt.pt_materials';
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
            [['analyte_matrix','concentration_range','fee','category_id'], 'required'],
            [['pt_code'], 'safe'],
            [['fee','category_id'], 'integer'],
            // [['pdffile'],'file'],
            [['image'], 'file', 'extensions' => 'png, jpg, jpeg, mp4'],
            // [['description'], 'string', 'max' => 1000],
        ];
    }

  

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category',
            'analyte_matrix' => 'Analyte Matrix',
            'concentration_range' => 'Concentration',
            'fee' => 'Fee',
            // 'date_added' => 'date Added',
            'image' => 'Image',
            // 'status' => 'Status',
        ];
    }

    public function getAvpOrderedByPt_category()
    {
        return Avp::find()
            ->orderBy('category_id')
            ->all();
    }
    public function getSection()
    {
        return $this->hasOne(Section::class, ['id' => 'section_id']);
    }


    public function getPt_materials()
    {
        return $this->hasOne(Pt_materials::className(), ['id' => 'category_id']);
    }
}
