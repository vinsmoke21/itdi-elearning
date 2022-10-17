<?php

namespace app\models\profile;

use Yii;

class Profile extends \yii\db\ActiveRecord
{
  
    public static function tableName()
    {
        return 'profile';
    }
  
    public static function getDb()
    {
        return Yii::$app->get('user_db');
    }
  
    public function rules()
    {
        return [
            [['fname', 'lname', 'mi', 'address', 'contact', 'section_id', 'code_name'], 'required'],
            [['section_id'], 'integer'],
            [['fname', 'lname', 'mi', 'address', 'contact'], 'string', 'max' => 255],
        ];
    }
  
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'fname' => 'First Name',
            'lname' => 'Last Name',
            'mi' => 'MI',
            'address' => 'Address',
            'contact' => 'Contact',
            'section_id' => 'Section',
            'code_name' => 'Code Name',
        ];
    }
}
