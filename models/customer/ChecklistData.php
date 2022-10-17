<?php

namespace app\models\customer;

use Yii;

/**
 * This is the model class for table "tbl_customer_type".
 *
 * @property int $id
 * @property string $customer_type
 */
class ChecklistData extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'checklist_data';
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

            [['id','training_background_id','userprofile_id'], 'integer'],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'training_background_id' => 'Check the Box if "YES", Leave Uncheck if "NO"',
            'userprofile_id' => 'Users Profile',
        ];
    }

}
