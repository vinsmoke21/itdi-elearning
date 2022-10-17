<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RfSampleDetails */

$this->title = 'Update Rf Sample Details: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Rf Sample Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="rf-sample-details-update">
&nbsp;
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
