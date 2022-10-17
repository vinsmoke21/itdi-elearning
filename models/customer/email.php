<?php

namespace app\models\customer;
use app\models\backend\Trainings;
use Yii;

/**
 * This is the model class for table "tbl_customer_type".
 *
 * @property int $id
 * @property string $customer_type
 */
class Email extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'email';
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
            [['email_address'], 'required'],
            [['subject', 'content', 'sent', 'sent_at', 'emailed_by'], 'safe'],
            [['id','training_id','profile_id'], 'integer'],
            // [['customer_type'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email_address' => 'Email Address*',
            'subject' => 'Subject',
            'sent' => 'Sent',
            'sent_at' => 'Sent At',
            'emailed_by' => 'Emailed by',
        ];
    }

    public function getTrainings()
    {
        return $this->hasOne(Trainings::className(), ['id' => 'training_id']);
    }

    
    public function getProfile()
    {
        return $this->hasOne(Usersprofile::className(), ['id' => 'profile_id']);
    }
}
