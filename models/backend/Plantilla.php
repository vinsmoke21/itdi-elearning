<?php
namespace app\models\backend;

use Yii;

/**
 * This is the model class for table "division".
 *
 * @property int $id
 * @property string $division_name
 * @property string $division_code
 */
class Plantilla extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'plantilla';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('itdidb_hris');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['id', 'division_id'], 'integer', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'division_id' => 'Division',
            'name' => 'Name',
        ];
    }

    public static function getPlantillaList($cat_id)
    {
        $plantilla = self::find()
            ->select(['id', 'name'])
            ->where(['division_id' => $cat_id])
            ->asArray()
            ->all();

        return $plantilla;
    }
}
