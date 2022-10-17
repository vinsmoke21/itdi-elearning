<?php

namespace app\models\backend;



use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "municipality".
 *
 * @property int $id
 * @property int $regionId
 * @property int $provinceId
 * @property string $name
 * @property int|null $district
 */
class Designation extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'designation';
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
            [['division_id', 'plantilla_id', 'position'], 'safe'],
            [['division_id', 'plantilla_id'], 'integer'],
            [['position'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'division_id' => 'Devision',
            'plantilla_id' => 'Plantilla',
            'position' => 'Position',

        ];
    }
    public static function getDesignationList($cat_id, $subcat_id)
    {
        $designation = ArrayHelper::map(
            self::find()
                ->select(['id', 'position'])
                ->where(['division_id' => $cat_id, 'plantilla_id' => $subcat_id])
                ->all(),
            'id',
            function ($model) {
                return ['id' => $model['id'], 'name' => $model['position']];
            }
        );

        return $designation;
    }
}
