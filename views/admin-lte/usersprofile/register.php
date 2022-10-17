<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;
use timurmelnikov\widgets\LoadingOverlayPjax;
use app\models\backend\Trainings;
use kartik\growl\Growl;
use yii\widgets\Pjax;
use wbraganca\dynamicform\DynamicFormWidget;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use app\models\customer\Region;
use app\models\customer\Usersprofile;

$this->registerCssFile('@web/css/style.css');
$this->registerCssFile('@web/css/home/main.css');
$this->registerCssFile('@web/css/nav.css');
$this->registerCssFile('@web/css/details.css');
$formatter = \Yii::$app->formatter;
date_default_timezone_set('Asia/Manila');
$this->title = 'ITDI | Inquiry';
$this->params['breadcrumbs'][] = $this->title;
// $model->password_id;

$this->registerCssFile('@web/css/home/button.css');
?>
<style>
  body {
    background-color: whitesmoke;
  }

  .time {
    font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    font-size: 30px;
    color: white;

  }

  .times {
    font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    font-size: 38px;
    color: white;

  }

  .text {
    font-size: 20px;
    font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
  }

  .text2 {
    color: white;
    font-size: 20px;
    font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
  }

  .text3 {
    color: white;
    font-size: 20px;
    font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
  }
</style>

<div class="container" style="margin-top: 100px">
  <div id="pst-container">

    <div class="row">
      <div class="col" style="background-color: white; margin-bottom: 80px; padding: 20px 30px;">



        <?php
        yii\widgets\Pjax::begin(['id' => 'dynamic-form']) ?>
        <?php $form = ActiveForm::begin(
          ['options' => ['data-pjax' => true]]
        ); ?>
        <?php
        LoadingOverlayPjax::begin([
          'color' => 'transparent',
          'fontawesome' => 'fas fa-cogs',

        ]);
        ?>
        <div class="panel panel-info">
          <div class="panel-heading" style="background-color: #2d98da">
            <div class="time"> <?php
                                echo date('D,  M j, Y \a\t g:ia');
                                ?></div>
          </div>
          <div style="padding: 10px 20px">
            <br>
            <p class="text">
              Please fill out this form to register for the webinar. To
              ensure the protection and privacy of participants in
              accordance with the Data Privacy Act of 2012, responses will
              be treated with utmost confidentiality. All responses will
              only be used for internal report preparation.
              <br />
              <br />
              NOTE: Use the password that we sent to your email. To be eligible for the certificate,
              participants need to pass all requirements and/or the exam to be given, whichever is applicable.
              Ensure all of given information is true and valid. Forms submitted will be validated thru email
              and names indicated. Slots will only be confirmed upon our validation of your submitted proof of payment.
            </p>

          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="panel panel-success">
              <div class="panel-heading" style="background-color: green;">
                <div class="text2">
                  Registration
                </div>
              </div>
              <div class="text2" style="padding: 10px 20px; color:green">
                <?= $form->field($model, 'password_id', [
                  'options' => ['class' => 'has-float-label'],
                  'labelOptions' => ['class' => ''],
                  'template' => '{input}{label}{error}{hint}',
                ],)->textInput(['placeholder' => 'Enter valid password', 'style' => 'height:50px; margin-top: 10px']) ?>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="panel panel-success">
              <div class="panel-heading" style="background-color: green;">
                <div class="text2">
                  <i class="glyphicon glyphicon-user"></i>&nbsp;&nbsp;Slots Available
                </div>
              </div>
              <div class="times" style="padding: 10px 20px; color:green; margin-top: 15px">
                <?php
                // $slotsAvailable = 1;
                echo $slotsAvailable . ' out of ' . $totalSlot . ' slots Available';
                ?>
              </div>
            </div>



            
            <?php
            $btnText = 'Closed';
            $btnsuccess = 'Next';

            if ($slotsAvailable <= 0) {
              echo Html::submitButton(
              
                $btnText,
                [
                  'style' => 'padding: 10px; font-size:20px; background:#3c8dbc;color:white; width:100px',
                  'id' => 'closed', 'disabled' => 'disabled',
                  'class' => 'pull-right btn btn-success' . $btnText
                ],
               
              );
            } else {
              echo Html::submitButton(
                $btnsuccess,
                [
                  'style' => 'padding: 10px; font-size:20px; background:#3c8dbc;color:white; width:100px',
                  'class' => 'pull-right btn btn-success' . $btnsuccess
                ]
              );
            }
            ?>

          </div>

        </div>
      </div>
    </div>
    <?php
    if ($submittedSuccessfully) {
      Growl::widget([
        'type' => Growl::TYPE_DANGER,
        'title' => 'Invalid Password!',
        'icon' => 'glyphicon glyphicon-ok-sign',
        'body' => 'Password did not match!',
        'showSeparator' => true,
        'delay' => 0,
        'pluginOptions' => [
          'showProgressbar' => true,
          'placement' => [
            'from' => 'top',
            'align' => 'right',
          ]
        ]
      ]);
    }
    ?>


    <?php LoadingOverlayPjax::end(); ?>
    <?php ActiveForm::end(); ?>
    <?php yii\widgets\Pjax::end() ?>

  </div>
</div>
</div>
</div>

<script type="text/javascript">
  $(function() {
    $("#service_check").change(function() {
      var st = this.checked;
      if (st) {
        $("#service_button").prop("disabled", false);
      } else {
        $("#service_button").prop("disabled", true);
      }
    });
  });
</script>

<!-- LOADING OVERLAY -->
<?php
$script = <<< JS
$.LoadingOverlaySetup({
      color           : "transparent",
       
    });

    $(document).ajaxSend(function(event, jqxhr, settings){
        $("#p0").LoadingOverlay("show");
        
    });

   
    $(document).ajaxComplete(function(event, jqxhr, settings){
        $("#p0").LoadingOverlay("hide");
        
    });

JS;
$this->registerJs($script, yii\web\View::POS_READY);
?>

<?php

$this->registerJs(
  '$("document").ready(function(){ 
		$("#new_country").on("pjax:end", function() {
			$.pjax.reload({container:"#countries"});  //Reload GridView
		});
    });'
);
?>