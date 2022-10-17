<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\lab\Section;
use app\models\SampleType;
use app\models\Calibration;
use app\models\Particulars;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;
use kartik\select2\Select2;

$this->registerCssFile('@web/css/details.css');
/* @var $this yii\web\View */
/* @var $model app\models\RfMainService */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rf-main-service-form">


&nbsp;

<div class="panel panel-primary">
          <div class="panel-heading">

              <i class="glyphicon glyphicon-cog"></i>&nbsp;&nbsp;<b>Create Request</b>
          </div>


    <?php $form = ActiveForm::begin([
      'action' => Url::toRoute('details/create'),
    ]); ?>

    <?php //$form->field($model, 'section')->textInput() ?>

    <?php //$form->field($model, 'sample_type')->textInput() ?>

    <?php //$form->field($model, 'sample_name')->textInput() ?>

    <?php //$form->field($model, 'particulars')->textInput() ?>

    <?php //$form->field($model, 'quantity')->textInput() ?>




           <div style="padding: 10px 20px">
    <?= $form->field($model, 'section')->dropDownList(
                   ArrayHelper::map(Section::find()->all(), 'id', 'section_name'), 
                   [
                   	'prompt'=>'Select section...', 
                   	'id' => 'cat-id'
                   ]
                ) ?>

    <?= $form->field($model, 'sample_type')->widget(DepDrop::classname(), [
        'options' => [
        	'prompt'=>'Select sample type...',
        	'id' => 'subcat-id',
        ],
	    'pluginOptions'=>[
	        'depends'=>['cat-id'],
	        'url'=>Url::to(['/service/subcat'])
	    ],
]); ?>

    
    <?= $form->field($model, 'sample_name')->widget(DepDrop::classname(), [
        'options' => [
        	'prompt'=>'Select sample name...',
        	'id' => 'snsubcat-id',
        ],
	    'pluginOptions'=>[
	        'depends'=>['subcat-id'],
	        'url'=>Url::to(['/service/snsubcat']),
	        'params' => ['cat-id'],
	    ],
]); ?>

    
    <?= $form->field($model, 'particulars')->widget(DepDrop::classname(), [
        'options' => [
        	'prompt'=>'Select  particulars...',
        	'id' => 'psubcat-id',
        ],
	    'pluginOptions'=>[
	        'depends'=>['snsubcat-id'],
	        'url'=>Url::to(['/service/psubcat'])
	    ],
]); ?>

	<?= $form->field($model, 'quantity')->textInput([
		'type' => 'number', 'min' => '0', 'onkeypress' => 'return event.charCode >= 48', 'value' => 0, 'disabled' => true, 'id' => 'quantity']

	) ?>

    <div class="form-group">
        <?= Html::submitButton('Next', ['class' => 'btn btn-success']) ?>
    </div>
</div>
    <?php ActiveForm::end(); ?>

</div>
</div>

<script>
$("#psubcat-id").on("change", function(){
	if($(this).val() != ""){
		$("#quantity").prop("disabled", false);
	}
	else{
		$("#quantity").prop("disabled", true);
	}
});



</script>