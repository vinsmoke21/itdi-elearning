<?php

namespace app\models\customer;
use app\models\backend\Trainings;
use app\models\backend\Seminars;
use Yii;

/**
 * This is the model class for table "{{%webinar_customer}}".
 *
 * @property int $id
 * @property string $transaction_code
 * @property int $counter
 * @property string $customer_code
 * @property string $fee
 * @property string $mode_of_payment
 * @property string $payment_status
 * @property int $training_id
 * @property int $seminar_id
 * @property string $no_of_participants
 * @property string $u_id
 * @property string $link
 * @property string $email
 * @property string|null $registered_by
 * @property string|null $registered_at
 */
class WebinarCustomer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%webinar_customer}}';
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
            [['fee','transaction_code', 'api','counter', 'customer_code', 'fee', 'payment_status', 'training_id', 'seminar_id', 'no_of_participants', 'u_id', 'password_id', 'link', 'email','payment','title','mode_of_payment'], 'safe'],
            // [['counter', 'training_id', 'seminar_id'], 'integer'],
            // [['transaction_code'], 'string', 'max' => 256],
         
            // [[ 'no_of_participants', 'u_id', 'link', 'email', 'registered_by', 'registered_at'], 'string', 'max' => 255],
            // [['mode_of_payment'], 'string', 'max' => 128],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'transaction_code' => 'Transaction Code',
            'counter' => 'Counter',
            'customer_code' => 'Customer Name',
            'email' => 'Email Address*',
            'fee' => 'Fee',
            'mode_of_payment' => 'Mode Of Payment',
            'payment_status' => 'Payment Status',
            'training_id' => 'Training Title',
            'seminar_id' => 'Seminar ID',
            'no_of_participants' => 'No Of Participants',
            'u_id' => 'U ID',
            'password_id' => 'Password',
            'link' => 'Link',
            'registered_by' => 'Registered By',
            'registered_at' => 'Registered At',
            'api' => 'Api'
        ];
    }



    public function getPaymentStatus()
    {
        return $this->cashier['payment_status'];
    }

    public function getCustomerName() {
        return $this->customer['customer_name'];
    }

    public function getTraining(){
        return $this->hasOne(Trainings::className(),['id'=>'training_id']);
    }

    public function getSeminar(){
        return $this->hasOne(Seminars::className(),['id'=>'seminar_id']);
    }
    // public function getAvailableSlots()
    // {
    //     return $this->hasMany(Usersprofile::class, ['training_id' => 'id']);
    // }

}
