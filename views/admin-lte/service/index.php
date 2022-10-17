<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RfMainServiceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Rf Main Services';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rf-main-service-index">
&nbsp;
    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Rf Main Service', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'section',
            'sample_type',
            'sample_name',
            'particulars',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
