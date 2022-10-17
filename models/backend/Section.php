<?php

namespace app\models\backend;
use yii\web\UploadedFile;
use yii\db\ActiveRecord;
use Yii;

/**
 * This is the model class for table "section".
 *
 * @property int $id
 * @property int $division_id
 * @property string $section_code
 * @property string $section_name
 * @property string $section_head
 * @property string $section_deputy
 * @property string $section_contact
 * @property int $section_service
 * @property int $section_status
 */
class Section extends ActiveRecord
{
   /**
     * @var UploadedFile
     */
    // public $imageFile;

    public static function tableName()
    {
        return 'itdidb_hris.section';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('itdidb_hris');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['division_id', 'section_code', 'section_name', 'section_head', 'section_deputy', 'section_contact', 'section_service', 'section_status'], 'required'],
            [['division_id', 'section_service', 'section_status'], 'integer'],
            [['section_code', 'section_contact'], 'string', 'max' => 50],
            [['section_name', 'section_head', 'section_deputy'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'division_id' => 'Division ID',
            'section_code' => 'Section Code',
            'section_name' => 'Section Name',
            'section_head' => 'Section Head',
            'section_deputy' => 'Section Deputy',
            'section_contact' => 'Section Contact',
            'section_service' => 'Section Service',
            'section_status' => 'Section Status',
        ];
    }
}
