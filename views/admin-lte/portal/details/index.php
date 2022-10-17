<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RfSampleDetailsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Rf Sample Details';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rf-sample-details-index">
&nbsp;
    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Rf Sample Details', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'cal_id',
            'parti_id',
            'customer_name',
            'address',
            //'contact',
            //'purpose',
            //'customer_type',
            //'industry_type',
            //'requesting_official',
            //'position',
            //'sample_brought_by',
            //'equipment_description',
            //'special_request',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
