<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\participants\models\SearchParticipantsInformation */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Participants Informations';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="participants-information-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Participants Information', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'firstname',
            'lastname',
            'middlename',


            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
