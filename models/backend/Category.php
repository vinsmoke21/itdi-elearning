<?php
namespace app\models\backend;

use yii\base\Model;
use yii\web\UploadedFile;
use yii\db\ActiveRecord;
use yii;

class Category extends ActiveRecord

{
    /**
     * @var UploadedFile
     */
    public $imageFile;

    public static function tableName()
    {
        return 'tbl_category';
    }
    public static function getDb()
    {
        return Yii::$app->get('itdidb_cportal');
    }

    public function rules()
    {
        return [

            [['category',], 'required'],

            [['id'],'integer'],
            
            // [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }
    
    // public function upload()
    // {
    //     if ($this->validate()) {
    //         $this->imageFile->saveAs('uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }
}

?>