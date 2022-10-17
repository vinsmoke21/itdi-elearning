<?php

namespace app\models\backend;

use Yii;

/**
 * This is the model class for table "attendance".
 *
 * @property int $id
 * @property string $trainsemID
 * @property string $timein
 * @property string $timeout
 * @property string $email
 * @property string $name
 */
class Attendance extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'attendance';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('itdidb_elearning');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['trainsemID', 'timein', 'timeout', 'email', 'name'], 'required'],
            [['timein', 'timeout'], 'safe'],
            [['trainsemID', 'name'], 'string', 'max' => 100],
            [['email'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'trainsemID' => 'Trainsem ID',
            'timein' => 'Timein',
            'timeout' => 'Timeout',
            'email' => 'Email',
            'name' => 'Name',
        ];
    }
}
