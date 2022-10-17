<?php

namespace app\models\backend;

use Yii;

/**
 * This is the model class for table "tbl_speaker".
 *
 * @property int $id
 * @property string $speakers
 * @property string $designation
 * @property int $reference_id
 */
class Speaker extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%speaker}}';
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
            [['speaker', ], 'safe'],
            [['id'], 'integer'],
            [['profile'], 'file', 'skipOnEmpty' => 'false', 'extensions' => 'png, jpg, jpeg','on'=>'create'],
            [['speaker', ], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'speaker' => 'Speaker Name',
            'profile' => 'Profile',
         
    
        ];
    }
    public function getExternals()
    {
        return $this->hasOne(External::className(), ['speaker_id' => 'id']);
    }
    public static function getSpeak()
    {
    return self::find()->select(['speaker', 'id'])->indexBy('id')->column();
    }

    
}
