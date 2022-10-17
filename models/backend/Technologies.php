<?php

namespace app\models\backend;

// use app\models\backend\Category;
use Yii;
// use app\models\backend\Technologies;

/**
 * This is the model class for table "techtransfer".
 *
 * @property int $id
 * @property int $techcategory_id
 * @property string $title
 * @property string $description
 * @property string $pdffile
 * @property string $image
 */
class Technologies extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $file;

    public static function tableName()
    {
        return 'itdidb_cportal.technologies';
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
            [['title', 'description','category_id'], 'required'],
            // [['pdffile','image'], 'safe'],
            [['category_id'], 'integer'],
            [['pdffile'],'file'],
            [['image'], 'file', 'extensions' => 'png, jpg, jpeg, mp4'],
            [['description'], 'string', 'max' => 1000],
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
            'title' => 'Title',
            'description' => 'Description',
            'pdffile' => 'Pdffile',
            'image' => 'Image',
            'status' => 'Status',
        ];
    }

    public function getAvpOrderedByTech_category()
    {
        return Avp::find()
            ->orderBy('category_id')
            ->all();
    }

    public function getTech_category()
    {
        return $this->hasOne(Tech_category::className(), ['id' => 'category_id']);
    }


    public function getTechnologies()
    {
        return $this->hasOne(Technologies::className(), ['id' => 'category_id']);
    }
}
