<?php

namespace app\models\backend;

use app\models\backend\Category;
use yii\base\Model;
use yii\web\UploadedFile;
use Yii;

/**
 * This is the model class for table "avp".
 *
 * @property int $id
 * @property int $cat_id
 * @property string $filename
 * @property string $title
 * @property int $status
 */
class Avp extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'itdidb_cportal.avp';
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
            [['filename'], 'string', 'max' => 500],
            [['cat_id','title','filename'], 'required'],
            [['cat_id',], 'string', 'max' => 200],
            [['title','status'], 'string', 'max' => 100],
            [['filename','title'], 'string', 'max' => 3000],
            [['id'], 'integer']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cat_id' => 'Category',
            'filename' => 'Filename',
            'title' => 'Title',
            'status' => 'Status',
        ];
    }

    public function getAvpOrderedByTblcategory()
    {
        return Avp::find()
            ->orderBy('cat_id')
            ->all();
        // $grouped = array();
        // foreach ($ungrouped as $seminar)
        // {
        //     $grouped[$seminar->category_id] = array_merge();
        // }
    }

    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'cat_id']);
    }
}
