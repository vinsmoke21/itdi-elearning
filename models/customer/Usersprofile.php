<?php

namespace app\models\customer;

use app\models\backend\Trainings;
use app\models\backend\Seminars;
use app\models\backend\Webinar_inquiry;
use Yii;

/**
 * This is the model class for table "usersprofile".
 *
 * @property int $id
 * @property int $userid
 * @property string|null $firstname
 * @property string|null $lastname
 * @property string|null $middlename
 * @property string|null $suffix
 * @property string|null $contactno
 * @property string|null $gender
 * @property string|null $agegroup
 * @property string|null $region
 * @property string|null $province
 * @property string|null $city
 * @property string|null $areyou
 * @property string|null $email
 * @property string $date_updated
 * @property string|null $sector
 */
class Usersprofile extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usersprofile';
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
            [['region_id', 'province_id', 'municipality_id', 'about', 'nickname',  
            'designation',  'food_restriction', 'title_of_training','transaction_id',], 'safe'],
            [['firstname', 'lastname', 'middlename', 'contactno', 'gender', 'agegroup', 
            'sector', 'company', 'name_extension', 'education',], 'required'],
            [['areyou', 'about' ,'email','home_address','purpose',], 'required'],
            [['userid', 'training_id', 'seminar_id', 'webinar_id','id'], 'integer'],
            [[ 'userid', 'date_updated',], 'safe'],
            [['firstname', 'lastname', 'middlename', 'contactno', 'gender', 'agegroup', 'sector'], 'string', 'max' => 255],
            // [['region', 'province', 'city', 'areyou'], 'string', 'max' => 256],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'userid' => 'Userid',
            'firstname' => 'First Name',
            'lastname' => 'Last Name',
            'training_id' => 'Training Title',
            'seminar_id' => 'Webinar Title',
            'webinar_id' => 'Webinar Inquiry',
            'lastname' => 'Last Name',
            'middlename' => 'Middle Name',
            'nickname' => 'Nickname',
            'home_address' => 'Home Address',
            'designation' => 'Designation',
            'purpose' => 'Purpose of Attending',
            'food_restriction' => 'Food Restriction',
            'title_of_training' => 'Title of Training',
            'name_extension' => 'Name Extension (Jr., Sr., III)',
            'contactno' => 'Office Contact Number',
            'gender' => 'Sex',
            'agegroup' => 'Age Group',
            'about' => 'How did you know about this training?',
            'areyou' => 'Are you a person with disability (PWD)',
            'email' => 'Email',
            'date_updated' => 'Date Updated',
            'sector' => 'Sector',
            'region_id' => 'Region',
            'province_id' => 'Province',
            'municipality_id' => 'Municipality',
            'education' => 'Educational Attainment',
            'company' => 'Company Name',
            'password_id' => 'Password',
            'transaction_id' => 'Transaction Code',



        ];
    }

    public function getRegions()
    {
        return $this->hasOne(Region::className(), ['id' => 'country_id']);
    }

    public function getProvinces()
    {
        return $this->hasOne(Province::className(), ['id' => 'regionId']);
    }

    public function getMunicipalities()
    {
        return $this->hasOne(Municipality::className(), ['id' => 'provinceId']);
    }

    public function getSeminar()
    {
        return $this->hasOne(Seminars::className(), ['id' => 'seminar_id']);
    }

    public function getTrainings()
    {
        return $this->hasOne(Trainings::className(), ['id' => 'training_id']);
    }

    public function getWebinar_inquiry()
    {
        return $this->hasOne(Webinar_inquiry::className(), ['id' => 'webinar_id']);
    }

}
