<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RfSampleDetailsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rf-sample-details-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'cal_id') ?>

    <?= $form->field($model, 'parti_id') ?>

    <?= $form->field($model, 'customer_name') ?>

    <?= $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'contact') ?>

    <?php // echo $form->field($model, 'purpose') ?>

    <?php // echo $form->field($model, 'customer_type') ?>

    <?php // echo $form->field($model, 'industry_type') ?>

    <?php // echo $form->field($model, 'requesting_official') ?>

    <?php // echo $form->field($model, 'position') ?>

    <?php // echo $form->field($model, 'sample_brought_by') ?>

    <?php // echo $form->field($model, 'equipment_description') ?>

    <?php // echo $form->field($model, 'special_request') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
