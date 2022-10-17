<?php

namespace app\models\backend;
use yii\helpers\ArrayHelper;
use Yii;

/**
 * This is the model class for table "external".
 *
 * @property int $id
 * @property int $speaker_id
 * @property string $designation
 */
class External extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'external';
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
            [['speaker_id', 'designation'], 'safe'],
            [['speaker_id'], 'integer'],
            [['designation'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'speaker_id' => 'Speaker ID',
            'designation' => 'Designation',
        ];
    }

    // public static function getExternalList($scat_id)
    // {
    //     $external = self::find()
    //         ->select(['id', 'designation'])
    //         ->where(['speaker_id' => $scat_id])
    //         ->asArray()
    //         ->all();

            

    //     return $external;
    // }

    public static function getExternalList($scat_id)
    {
        $external = ArrayHelper::map(
            self::find()
                ->select(['id', 'designation'])
                ->where(['speaker_id' => $scat_id])
                ->all(),
            'id',
            function ($model) {
                return ['id' => $model['id'], 'name' => $model['designation']];
            }
        );

        return $external;
    }
//   public static function getEx()
//     {
//     return self::find()->select(['designation', 'id'])->indexBy('id')->column();
//     }
}
