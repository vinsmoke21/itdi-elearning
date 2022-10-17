<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\participants\models\ParticipantsInformation */

// $this->title = 'Create Participants Information';
$this->params['breadcrumbs'][] = ['label' => 'Participants Informations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="participants-information-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'submittedSuccessfully' => $submittedSuccessfully,
        'region' => $region,
        'province' => $province,
        'municipality' => $municipality,
        'inquiry' => $inquiry,
        'slotsAvailable' => $slotsAvailable,
        'totalSlot' => $totalSlot,
        'background' => $background,
        'checklist' => $checklist,
        'checklistT' => $checklistT,
        'checklistS' => $checklistS,
    
    ]) ?>

</div>
