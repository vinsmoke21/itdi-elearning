<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RfMainService */


$this->params['breadcrumbs'][] = ['label' => 'Create Request', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rf-main-service-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
