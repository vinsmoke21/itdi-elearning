<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RfSampleDetails */
/* @var $calibrationModel app\models\Calibration */
/* @var $particularModel app\models\Particulars */
/* @var $quantity integer */


$this->params['breadcrumbs'][] = ['label' => 'Rf Sample Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rf-sample-details-create">
&nbsp;
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'calibrationModel' => $calibrationModel,
        'particularModel' => $particularModel,
        'quantity' => $quantity,
    ]) ?>

</div>
