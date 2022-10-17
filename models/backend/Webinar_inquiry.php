<?php

namespace app\models\backend;

use yii\captcha\Captcha;
use app\models\customer\Usersprofile;
use Yii;
use app\components\WordsValidator;
use app\models\customer\WebinarCustomer;
use yii\base\Model;

/**
 * This is the model class for table "emails".
 *
 * @property int $id
 * @property string $receiver_email
 * @property string $name
 * @property string $address
 * @property string $contactnum
 * @property string $mop
 * @property string $nop
 * @property string $subject
 * @property int $seminar_id
 * @property int $training_id
 * @property string $service_type
 */
class Webinar_inquiry extends \yii\db\ActiveRecord
{



    // public $captcha;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'webinar_inquiry';
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

            [['name', 'address', 'contactnum', 'mop', 'nop',], 'required'],
            [[
                'u_id',
                'receiver_email',
                'training_title',

            ], 'safe'],

            [['seminar_id', 'training_id',], 'integer'],
            [['address'], 'string', 'max' => 200],
            [['name', 'contactnum'], 'string', 'max' => 50],
            [['mop', 'nop'], 'string', 'max' => 100],
            // [['subject'], 'string', 'max' => 255],

            [
                'receiver_email', 'required', 'when' => function ($model) {
                    return $model->mop == 'E-payment';
                },
                'whenClient' => "function (attribute, value) {
                    return $('#webinar_inquiry-mop').val() == 'E-payment';
                }"
            ],


        ];
    }



    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'receiver_email' => 'Email',
            'name' => 'Name',
            'address' => 'Address',
            'contactnum' => 'Contact Number',
            'mop' => 'Mode of Payment',
            'nop' => 'Number of Participants',
            'subject' => 'Subject',
            'seminar_id' => 'Seminar ID',
            'training_id' => 'Training ID',
            'u_id' => 'link'
        ];
    }

    public function getSeminar()
    {
        return $this->hasOne(Seminars::className(), ['id' => 'seminar_id']);
    }

    public function getTrainings()
    {
        return $this->hasOne(Trainings::className(), ['id' => 'training_id']);
    }

    public function getAvailableSlots()
    {
        // var_dump($this->getParticipants()->count());die;
        return $this->getParticipants()->count();
    }

    public function getCustomers()
    {
        return $this->hasMany(WebinarCustomer::class, ['id' => 'webinar_id']);
    }

    public function getParticipants()
    {
        return $this->hasMany(Usersprofile::class, ['webinar_id' => 'id']);
    }
}
