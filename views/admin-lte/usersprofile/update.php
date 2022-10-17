<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\participants\models\ParticipantsInformation */

$this->title = 'Update Participants Information: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Participants Informations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="participants-information-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
