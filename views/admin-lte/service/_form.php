<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\lab\Section;
use app\models\nlims\SampleType;
use app\models\nlims\Calibration;
use app\models\nlims\Particulars;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;
use kartik\select2\Select2;

$this->title = 'ITDI | Inquiry';
$this->params['breadcrumbs'][] = $this->title;

?>


<meta name="viewport" content="width=device-width, initial-scale=1" /> 
<html>
  <body>
  <div class="rf-sample-details-form">
  <div class="container" style="margin-top: 100px">
    <div class="row">          
    <div class="customer-form">
            <?php $form = ActiveForm::begin([
            'action' => Url::toRoute('details/create'),
            ]); ?>
                <div class="panel panel-success">
                        <div class="panel-heading">
                            <i class="glyphicon glyphicon-cog"></i>&nbsp;&nbsp;<b>Create Request</b>
                        </div>
                        <div style="padding: 10px 20px">
                            <div class="row">

                                <?= $form->field($model, 'section')->dropDownList(
                                    ArrayHelper::map(Section::find()->all(), 'id', 'section_name'), 
                                    [
                                        'prompt'=>'Select section...', 
                                        'id' => 'cat-id'
                                    ]) 
                                ?>

                                <?= $form->field($model, 'sample_type')->widget(DepDrop::classname(), [
                                    'options' => [
                                        'prompt'=>'Select sample type...',
                                        'id' => 'subcat-id',
                                    ],
                                    'pluginOptions'=>[
                                        'depends'=>['cat-id'],
                                        'url'=>Url::to(['/service/subcat'])
                                    ],
                                    ]); 
                                ?>

                            
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
                                    ]); 
                                ?>

                            
                                <?= $form->field($model, 'particulars')->widget(DepDrop::classname(), [
                                    'options' => [
                                        'prompt'=>'Select  particulars...',
                                        'id' => 'psubcat-id',
                                    ],
                                    'pluginOptions'=>[
                                        'depends'=>['snsubcat-id'],
                                        'url'=>Url::to(['/service/psubcat'])
                                    ],
                                    ]);
                                ?>

                                <?= $form->field($model, 'quantity')->textInput([
                                    'type' => 'number', 'min' => '0', 'onkeypress' => 'return event.charCode >= 48', 'value' => 0, 'disabled' => true, 'id' => 'quantity']

                                ) ?>
        
                            </div>
                            <div class="form-group">
                                <?= Html::submitButton('Next', ['class' => 'btn btn-success']) ?>
                            </div>
                        </div>
          <?php ActiveForm::end(); ?>
      </div>
    </div>
  </div>
</div>
</body>
</html>
        

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
