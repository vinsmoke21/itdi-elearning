<?php

namespace app\models\backend;
use app\models\backend\Category;
use app\models\customer\ChecklistTraining;
use yii\base\Model;
use yii\web\UploadedFile;
use Yii;

/**
 * This is the model class for table "tbltrainings".
 *
 * @property int $id
 * @property string $category_id
 * @property string $thumbnailpath
 * @property string $filename
 * @property string $datecreate
 * @property string $title
 * @property string $description
 * @property string $scheduledate
 * @property string $scheduletime
 * @property string $nameofspeaker
 * @property string $designation
 * @property string $payment
 * @property string $status
 */
class Trainings extends \yii\db\ActiveRecord
{
    public $stat;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'itdidb_cportal.tbl_trainings';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('itdidb_cportal');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['filename'], 'file', 'extensions' => 'png, jpg, jpeg'],
            [['category_id','title', 'description', 'scheduledate', 'scheduleend', 'nameofspeaker', 'designation', 'payment','filename',], 'required'],
            [['category_id', 'thumbnailpath',], 'string', 'max' => 200],
            [['created_at', 'title', 'scheduledate', 'scheduleend', 'scheduletime', 'nameofspeaker', 'designation', 'payment', 'status'], 'string', 'max' => 100],
            [['description','filename'], 'string', 'max' => 3000],
            [['id','customized'], 'integer']
        ];
    }



//     public function upload() {
//     // We validate the model before doing anything else
//     if($this->validate()) {
//         // The model was validated so we can now save the uploaded file.
//         // Note how we can get the baseName and extension from the 
//         // uploaded file, so we can keep the same name and extension.
//         $this->filename->saveAs('uploads/' . $this->filename->baseName . '.' . $this->filename->extension);
//         return true;
//     }
//     return false;
// }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category',
            'thumbnailpath' => 'Thumbnailpath',
            'filename' => 'Image',
            'created_at' => 'Created_at',
            'title' => 'Title',
            'description' => 'Description',
            'scheduledate' => 'Start Schedule',
            'scheduleend' => 'End Schedule',
            'scheduletime' => 'Time',
            'speaker' => 'Speaker',
            'designation' => 'Designation',
            'payment' => 'Payment',
            'status' => 'Status',
            'customized' => 'Customized',
        ];
    }



    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }


    public function getFiles()
    {
        return $this->hasOne(Trainings::className(), ['id' => 'training_id']);
    }
    public function getChekcT()
    {
        return $this->hasOne(ChecklistTraining::className(), ['training_id' => 'id']);
    }
}

