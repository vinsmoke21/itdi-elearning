<?php

namespace app\models\backend;

use Yii;

/**
 * This is the model class for table "techinquiry".
 *
 * @property int $id
 * @property string $name
 * @property string $company
 * @property string $nature_of_business
 * @property string $address
 * @property string $contact_number
 * @property string $email
 * @property string $technology
 * @property string $message
 * @property int $status_id
 * @property string $timestamp
 * @property string $date_update
 *
 * @property TechActivityHistory[] $techActivityHistories
 * @property TechInquiryStatus $status
 */
class Techinquiry extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'techinquiry';
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
            [['name', 'company', 'nature_of_business', 'address', 'contact_number', 'email', 'message','meeting'], 'required'],
            // [['status_id'], 'integer'],
            // [['timestamp', 'date_update'], 'safe'],
            [['engagement_type', 'date','tech_title'], 'safe'],

            [
                'engagement_type', 'required', 'when' => function ($model) {
                    return $model->meeting == 'Yes';
                },
                'whenClient' => "function (attribute, value) {
                    return $('#techinquiry-meeting').val() == 'Yes';
                }"
            ],

            [
                'date', 'required', 'when' => function ($model) {
                    return $model->meeting == 'Yes';
                },
                'whenClient' => "function (attribute, value) {
                    return $('#techinquiry-meeting').val() == 'Yes';
                }"
            ],

            [['name', 'company', 'nature_of_business', 'address', 'contact_number', 'email',], 'string', 'max' => 100],
            [['message'], 'string', 'max' => 500],
            // [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => TechInquiryStatus::className(), 'targetAttribute' => ['status_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Full Name',
            'company' => 'Company',
            'nature_of_business' => 'Nature Of Business',
            'address' => 'Address',
            'contact_number' => 'Contact Number',
            'email' => 'Email',
            'technology' => 'Technology',
            'message' => 'Message',
            'tech_id' => 'Tech ID',
            'status_id' => 'Status ID',
            'meeting' => 'Would you like to set a meeting?:',
            'date' => 'Preferred Schedule:',
            'engagement_type' => 'Type of Engagement:',
            // 'timestamp' => 'Timestamp',
            // 'date_update' => 'Date Update',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    // public function getTechActivityHistories()
    // {
    //     return $this->hasMany(TechActivityHistory::className(), ['iquiry_id' => 'id']);
    // }

    /**
     * @return \yii\db\ActiveQuery
     */
    // public function getStatus()
    // {
    //     return $this->hasOne(TechInquiryStatus::className(), ['id' => 'status_id']);
    // }

    // public function getTechtransfer()
    // {
    //     return $this->hasOne(Techtransfer::className(), ['tech_id' => 'id']);
    // }

}
