<?php

namespace app\models\backend;

use Yii;
use app\models\backend\Category;

/**
 * This is the model class for table "tbl_seminars".
 *
 * @property int $id
 * @property int $category_id
 * @property string $thumbnailpath
 * @property string $created_at
 * @property string $filename
 * @property string $title
 * @property string $description
 * @property string $speaker
 * @property string $designation
 * @property string $datesched
 * @property string $timesched
 * @property string $payment
 * @property int $status
 */
class Seminars extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'itdidb_cportal.tbl_seminars';
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
            [['category_id', 'title', 'description', 'speaker', 'designation', 'datesched', 'dateschedend', 'timesched', 'payment'], 'required'],
            [['category_id', 'status'], 'integer'],
            [['description'], 'string'],
            [['thumbnailpath', 'title'], 'string', 'max' => 200],
            [['created_at', 'filename', 'speaker', 'designation', 'datesched', 'dateschedend', 'timesched', 'payment'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category ID',
            'thumbnailpath' => 'Thumbnailpath',
            'created_at' => 'Created At',
            'filename' => 'Filename',
            'title' => 'Title',
            'description' => 'Description',
            'speaker' => 'Speaker',
            'designation' => 'Designation',
            'datesched' => 'Date Start',
            'dateschedend' => 'Date End',
            'timesched' => 'Time',
            'payment' => 'Payment',
            'status' => 'Status',
        ];
    }

       public function getSeminarsOrderedByCategory()
    {
        return Seminars::find()
            ->orderBy('category_id')
            ->all();
    }

    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }
}


