<?php
namespace app\models\ptservices;

use yii\base\Model;
use yii\web\UploadedFile;
use yii\db\ActiveRecord;
use yii;

class PtCategories extends ActiveRecord

{
    /**
     * @var UploadedFile
     */
    // public $imageFile;

    public static function tableName()
    {
        return 'itdidb_pt.pt_categories';
    }
    public static function getDb()
    {
        return Yii::$app->get('itdidb_pt');
    }

    public function rules()
    {
        return [

            [['target_analytes',], 'required'],

            [['id',],'integer'],
            
            // [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }

        /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            // 'section_id' => 'Section ID',
            'target_analytes' => 'target_analytes',
        ];
    }

}

?>