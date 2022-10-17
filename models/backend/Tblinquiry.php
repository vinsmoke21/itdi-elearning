<?php

namespace app\models\backend;

use Yii;
use app\models\backend\ServicesCategory;
/**
 * This is the model class for table "tblinquiry".
 *
 * @property int $id
 * @property string $name
 * @property string $industry
 * @property int $contactnum
 * @property string $emails
 * @property string $details
 * @property string $suggestions
 */
class Tblinquiry extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    // public $captcha;
    // public $verifyCode;

    public static function tableName()
    {
        return 'tblinquiry';
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
            [['name', 'industry', 'address', 'emails','details','suggestions','services_id'], 'required'],
            // [['details', 'suggestions'], 'safe'],
            [['contactnum'], 'integer'],
            [['name', 'industry', 'emails', 'contactnum'], 'string', 'max' => 100],
            [['details', 'suggestions'], 'string', 'max' => 2000],
            // ['captcha', 'captcha'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name:',
            'industry' => 'Industry:',
            'address' => 'Address:',
            'contactnum' => 'Contact Number:',
            'emails' => 'Email:',
            'services_id' => 'Services Category',
            'details' => 'Please include additional details:',
            'suggestions' => 'Message / Comments / Suggestions:',
        ];
    }

    public function getServices()
    {
        return $this->hasOne(ServicesCategory::className(), ['id' => 'services_id']);
    }
}
