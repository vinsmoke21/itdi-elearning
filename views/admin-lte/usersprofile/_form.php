<?php

use app\models\backend\Seminars;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;
use timurmelnikov\widgets\LoadingOverlayPjax;
use app\models\backend\Trainings;
use app\models\customer\ChecklistTraining;
use kartik\growl\Growl;
use wbraganca\dynamicform\DynamicFormWidget;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;

use kartik\select2\Select2;
use app\models\customer\Region;
use app\models\customer\TrainingBackground;
use app\models\customer\Usersprofile;

$this->registerCssFile('@web/css/style.css');
$this->registerCssFile('@web/css/home/main.css');
$this->registerCssFile('@web/css/nav.css');
$this->registerCssFile('@web/css/details.css');
$formatter = \Yii::$app->formatter;
date_default_timezone_set('Asia/Manila');
$this->title = 'ITDI | Inquiry';
$this->params['breadcrumbs'][] = $this->title;
// var_dump(); die;

?>
<!-- <link rel="stylesheet" href="https://cdn.rawgit.com/tonystar/bootstrap-float-label/v4.0.2/bootstrap-float-label.min.css"/> -->
<meta name="viewport" content="width=device-width, initial-scale=1" />
<html>

<style>
  .pstcontainer {
    width: 500px;
    margin: 0 auto;
  }

  body {
    background-color: whitesmoke;
  }

  .time {
    font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    font-size: 30px;
    color: white;

  }

  .text {
    font-size: 20px;
    font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
  }
</style>

<body>



  <div class="pstcontainer" style="margin-top: 100px">
    <div class="row">
      <div class="col" style="background-color: white; margin-bottom: 80px; padding: 20px 30px;">

        <div class="customer-form" style="padding-bottom: 20px;">
          <?php
          yii\widgets\Pjax::begin(['id' => 'dynamic-form']) ?>
          <?php $form = ActiveForm::begin(
            [
              'id' => 'modal-form',
              // 'action' => ['create'],
              'options' => ['data-pjax' => true]
            ]
          ); ?>
          <?php
          LoadingOverlayPjax::begin([
            'color' => 'transparent',
            'fontawesome' => 'fas fa-cogs',

          ]);
          ?>
          <div class="panel panel-success">
            <div class="panel-heading" style="color:green; text-align:center">
              <h4>
                <?php
                if ($model->title_of_training != null) {
                  echo $model->title_of_training;
                }
                echo $model->title_of_seminar;
                ?>
              </h4>
            </div>
            <div class="text" style="padding: 10px 20px">
            </div>
            <div class="time" style="padding: 10px 20px; color:green">
              <?php
              echo $slotsAvailable . ' out of ' . $totalSlot . ' slots Available';
              ?>
            </div>
          </div>

          <div class="panel panel-info">
            <div class="panel-heading" style="background-color: #2d98da; color:white">
              <i class="glyphicon glyphicon-user"></i>&nbsp;&nbsp;<b>Participants Profile</b>
            </div>
            <div style="padding: 10px 20px; margin-top:10px">

              <?= $form->field($model, 'firstname', [
                'options' => ['class' => 'has-float-label'],
                'labelOptions' => [''],
                'template' => '{input}{label}{error}{hint}',
              ],)->textInput(['maxlength' => true, 'placeholder' => 'Enter your first name']) ?>


              <?= $form->field($model, 'lastname', [
                'options' => ['class' => 'has-float-label', 'style' => 'margin-top:20px'],
                'template' => '{input}{label}{error}{hint}',
              ],)->textInput(['maxlength' => true, 'placeholder' => 'Enter your last name']) ?>


              <?= $form->field($model, 'middlename', [
                'options' => ['class' => 'has-float-label', 'style' => 'margin-top:20px'],
                'template' => '{input}{label}{error}{hint}',
              ],)->textInput(['maxlength' => true, 'placeholder' => 'Enter your middle name']) ?>

              <?= $form->field($model, 'name_extension', [
                'options' => ['class' => 'has-float-label', 'style' => 'margin-top:20px'],
                'labelOptions' => ['class' => ''],
                'template' => '{input}{label}{error}{hint}',
              ],)->dropDownlist(
                ['Jr.' => 'Jr.', 'Sr.' => 'Sr.', 'III' => 'III', 'Other' => 'Other', 'None' => 'None'],
                ['prompt' => 'Please select...']
              ) ?>

              <?= $form->field($model, 'nickname', [
                'options' => ['class' => 'has-float-label', 'style' => 'margin-top:20px'],
                'template' => '{input}{label}{error}{hint}',
              ],)->textInput(['maxlength' => true, 'placeholder' => 'Enter your nickname']) ?>

              <?= $form->field($model, 'gender', [
                'options' => ['class' => 'has-float-label', 'style' => 'margin-top:20px'],
                'labelOptions' => ['class' => ''],
                'template' => '{input}{label}{error}{hint}',
              ],)->dropDownlist(
                ['Male' => 'Male', 'Female' => 'Female'],
                ['prompt' => 'Please select...']
              ) ?>

              <?= $form->field($model, 'email', [
                'options' => ['class' => 'has-float-label', 'style' => 'margin-top:20px'],
                'template' => '{input}{label}{error}{hint}',
              ],)->textInput(['type' => 'email', 'maxlength' => true, 'placeholder' => 'Enter your email']) ?>

              <?= $form->field($model, 'agegroup', [
                'options' => ['class' => 'has-float-label', 'style' => 'margin-top:20px'],
                'labelOptions' => ['class' => ''],
                'template' => '{input}{label}{error}{hint}',
              ],)->dropDownlist(
                [
                  '21 yrs. old and below' => '21 yrs. old and below',
                  '22-29 yrs. old' => '22-29 yrs. old',
                  '30-39 yrs. old' => '30-39 yrs. old',
                  '40-49 yrs. old' => '40-49 yrs. old',
                  '50-59 yrs. old' => '50-59 yrs. old',
                  '60 yrs. old and above' => '60 yrs. old and above',
                ],
                ['prompt' => 'Please select...']
              ) ?>

              <?= $form->field($model, 'education', [
                'options' => ['class' => 'has-float-label', 'style' => 'margin-top:20px'],
                'labelOptions' => ['class' => ''],
                'template' => '{input}{label}{error}{hint}',
              ],)->dropDownlist(
                [
                  'Elementary' => 'Elementary', 'Highschool' => 'Highschool', 'Technical Vocational' => 'Technical Vocational',
                  'College Degree' =>  'College Degree',   'Masteral' =>  'Masteral',
                  'Doctoral' =>  'Doctoral', 'Diploma' => 'Diploma', 'None' => 'None'
                ],
                ['prompt' => 'Please select...']
              ) ?>
            </div>
          </div>

          <div class="panel panel-info">
            <div class="panel-heading" style="background-color: #2d98da; color:white">
              <i class="glyphicon glyphicon-home"></i>&nbsp;&nbsp;<b>Current Address</b>
            </div>
            <div style="padding: 10px 20px; margin-top:10px">

              <?= $form->field(
                $model,
                'region_id',
                [
                  'options' => ['class' => 'has-float-label', 'style' => 'margin-top:20px'],
                  'labelOptions' => ['class' => ''],
                  'template' => '{input}{label}{error}{hint}',
                ]
              )->dropDownList(
                ArrayHelper::map(Region::find()->all(), 'id', 'code'),
                [

                  'prompt' => 'Select region...',
                  'id' => 'cat-id'
                ]
              )
              ?>

              <?= $form->field(
                $model,
                'province_id',
                [
                  'options' => ['class' => 'has-float-label', 'style' => 'margin-top:20px'],
                  'labelOptions' => ['class' => ''],
                  'template' => '{input}{label}{error}{hint}',
                ]

              )->widget(DepDrop::classname(), [
                'options' => [
                  'prompt' => 'Select province...',
                  'id' => 'subcat-id',
                ],
                'pluginOptions' => [
                  'depends' => ['cat-id'],
                  'url' => Url::to(['/usersprofile/province'])
                ],
              ]);
              ?>

              <?= $form->field(
                $model,
                'municipality_id',
                [
                  'options' => ['class' => 'has-float-label', 'style' => 'margin-top:20px'],
                  'labelOptions' => ['class' => ''],
                  'template' => '{input}{label}{error}{hint}',
                ]
              )->widget(
                DepDrop::classname(),
                [
                  'options' => ['prompt' => 'Select municipality...'],
                  'pluginOptions' => [
                    'depends' => ['cat-id', 'subcat-id'],
                    'placeholder' => 'Select Municipality...',
                    'url' => Url::to(['/usersprofile/municipality'])
                  ]
                ]
              ); ?>

              <?= $form->field($model, 'home_address', [
                'options' => ['class' => 'has-float-label', 'style' => 'margin-top:20px'],
                'template' => '{input}{label}{error}{hint}',
              ],)->textarea(['maxlength' => true, 'placeholder' => 'Enter your current address']) ?>


            </div>
          </div>

          <div class="panel panel-info">
            <div class="panel-heading" style="background-color: #2d98da; color:white">
              <i class="glyphicon glyphicon-envelope"></i>&nbsp;&nbsp;<b>Employment Information</b>
            </div>
            <div style="padding: 10px 20px; margin-top:10px">
              <?= $form->field($model, 'company', [
                'options' => ['class' => 'has-float-label', 'style' => 'margin-top:20px'],
                'labelOptions' => [''],
                'template' => '{input}{label}{error}{hint}',
              ],)->textInput(['maxlength' => true, 'placeholder' => 'Put "N/A" if None']) ?>

              <?= $form->field($model, 'designation', [
                'options' => ['class' => 'has-float-label', 'style' => 'margin-top:20px'],
                'labelOptions' => [''],
                'template' => '{input}{label}{error}{hint}',
              ],)->textInput(['maxlength' => true, 'placeholder' => 'Put "N/A" if None']) ?>

              <?= $form->field($model, 'contactno', [
                'options' => ['class' => 'has-float-label', 'style' => 'margin-top:20px'],
                'labelOptions' => [''],
                'template' => '{input}{label}{error}{hint}',
              ],)->textInput(['maxlength' => true, 'placeholder' => 'Put "N/A" if None']) ?>


              <?= $form->field($model, 'sector', [
                'options' => ['class' => 'has-float-label', 'style' => 'margin-top:20px'],
                'labelOptions' => ['class' => ''],
                'template' => '{input}{label}{error}{hint}',
              ],)->dropDownlist(
                [
                  'Academe(Teacher,Professor,School Faculty Staff, University Researcher)' => 'Academe(Teacher,Professor,School Faculty Staff, University Researcher)',
                  'Association' => 'Association',
                  'Cooperative' => 'Cooperative',
                  'Individual/ NEET(Retiree, Housewife, Unemployed, etc.)' => 'Individual/ NEET(Retiree, Housewife, Unemployed, etc.)',
                  'Government' => 'Government',
                  'LGU' => 'LGU',
                  'NGO' => 'NGO',
                  'OFW' => 'OFW',
                  'Private (Sole Proprietor,Entrepreneur,MSME,big corporation/companies)' => 'Private (Sole Proprietor,Entrepreneur,MSME,big corporation/companies)',
                  'Student' => 'Student',
                ],
                ['prompt' => 'Please select...']
              ) ?>
            </div>
          </div>


          <div class="panel panel-info">
            <div class="panel-heading" style="background-color: #2d98da; color:white">
              <i class="glyphicon glyphicon-pencil"></i>&nbsp;&nbsp;<b>Additional Information</b>
            </div>
            <div style="padding: 10px 20px; margin-top:10px">
              <?= $form->field($model, 'areyou', [
                'options' => ['class' => 'has-float-label', 'style' => 'margin-top:20px'],
                'labelOptions' => ['class' => ''],
                'template' => '{input}{label}{error}{hint}',
              ],)->dropDownlist(
                [
                  'No' => 'No',
                  'Yes' => 'Yes',
                ],
                ['prompt' => 'Please select...']
              ) ?>
              <!-- //condition for food restriction -->
              <?php
              
              if ($model->training_id == null) {
               
                $mode = Seminars::find()->where(['id' => $model['seminar_id']])->one();
                // var_dump( $mode);die;
                if ($mode->mode != '3') : {
                  } ?>
                  <?= $form->field($model, 'food_restriction', [
                    'options' => ['class' => 'has-float-label', 'style' => 'margin-top:20px'],
                    'labelOptions' => [''],
                    'template' => '{input}{label}{error}{hint}',
                  ],)->textInput(['maxlength' => true, 'placeholder' => '(e.g., pork, shrimp, chicken, etc.)']) ?>

                <?php endif;
              }

              if ($model->training_id != null) {
                
                $mode = Trainings::find()->where(['id' => $model['training_id']])->one();
                if ($mode->mode != '3') : {
                  } ?>
                  <?= $form->field($model, 'food_restriction', [
                    'options' => ['class' => 'has-float-label', 'style' => 'margin-top:20px'],
                    'labelOptions' => [''],
                    'template' => '{input}{label}{error}{hint}',
                  ],)->textInput(['maxlength' => true, 'placeholder' => '(e.g., pork, shrimp, chicken, etc.)']) ?>
              <?php endif;
              }
              ?>
               <!-- //condition for food restriction end -->

              <?= $form->field($model, 'about', [
                'options' => ['class' => 'has-float-label', 'style' => 'margin-top:20px'],
                'labelOptions' => ['class' => ''],
                'template' => '{input}{label}{error}{hint}',
              ],)->dropDownlist(
                [
                  'Social Media' => 'Social Media', 'Word of Mouth'
                  => 'Word of Mouth', 'ITDI Website' => 'ITDI Website',
                  'Invitation from DOST Regional Office' => 'Invitation from DOST Regional Office'
                ],
                ['prompt' => 'Please select...']
              ) ?>

              <?= $form->field($model, 'purpose', [
                'options' => ['class' => 'has-float-label', 'style' => 'margin-top:20px'],
                'labelOptions' => [''],
                'template' => '{input}{label}{error}{hint}',
              ],)->textarea(['maxlength' => true, 'placeholder' => 'What is your reason for attending this training?']) ?>
            </div>
          </div>

          <?php
          if ($model->training_id == null) {
           
            $checkSem = ChecklistTraining::find()->where(['seminar_id' => $model['seminar_id']])->one();
            if ($checkSem != null) : {
              } ?>

              <div class="panel panel-info">
                <div class="panel-heading" style="background-color: #2d98da; color:white">
                  <i class="glyphicon glyphicon-ok"></i>&nbsp;&nbsp;<b>Training Background/Requirements</b>
                </div>
                <div style="padding: 10px 20px; margin-top:10px">
                  <?php
                  $listData = ArrayHelper::map($checklistS, 'training_background_id', 'background.requirements');
                  echo Html::activeHiddenInput($checklist, 'id');
                  echo $form->field($checklist, 'training_background_id')->checkboxList($listData);
                  ?>
                </div>
              </div>
            <?php endif;
          }

          if ($model->training_id != null) {
            $check = ChecklistTraining::find()->where(['training_id' => $model['training_id']])->one();
            if ($check != null) : {
              } ?>
              <div class="panel panel-info">
                <div class="panel-heading" style="background-color: #2d98da; color:white">
                  <i class="glyphicon glyphicon-ok"></i>&nbsp;&nbsp;<b>Training Background/Requirements</b>
                </div>
                <div style="padding: 10px 20px; margin-top:10px">
                  <?php
                  $listData = ArrayHelper::map($checklistT, 'training_background_id', 'background.requirements');

                  echo Html::activeHiddenInput($checklist, 'id');
                  echo $form->field($checklist, 'training_background_id')->checkboxList($listData);
                  ?>
                </div>
              </div>
          <?php endif;
          }
          ?>


          <input type="checkbox" id="service_check" />
          <label for="service_check">
            By checking this box, you would agree to the <a data-toggle="modal" style="cursor:pointer" data-target="#myModal">Terms and Conditions</a>
          </label>
          <label>of ITDI.</label>


          <div class="form-group pull-right" style="margin-top: 20px;">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-success', 'id' => 'service_button', 'disabled' =>
            'disabled']) ?>
          </div>


          <!-- Modal - START-->
          <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h3 class="modal-title" align="center"><b>Terms and Conditions</b></h3>
                </div>
                <div class="modal-body">
                  <h4 align="center"><b>ITDI Terms and Conditions on Electronic Submission of Request / Inquiry</b></h4>
                  <br />
                  <p align="justify"> Industrial Technology Development Institute (ITDI) respect your right to privacy and want you to inform you how we collect, use, and share your personal information. In compliance with the Republic Act No. 10173, otherwise known as the Data Privacy Act of 2012 ("DPA"), this privacy policy covers the data processing activities of ITDI. Policy applies when you use any ITDI online and on premise information systems in acquiring government services provided by ITDI. The following data will be collected from you when you transact or register in any ITDI services systems: Full Name, Company Name, Company Designation, Contact Information such as mobile no., landline, no., fax no and email address both official and personal, Home or Office Address, Customer Type, Business Industry Type, transaction details and other information needed to process your transaction. To facilitate online transaction, ITDI acquired hosting of transaction process and data storage to a third party provider. ITDI also uses a free third party email provider to facilitate online communication to our customer, manual and auto-generated sending. Additionally, in the course of the rendering of services, your information may be shared to other government agencies for our compliance and to private companies for promotional activities. Rest assured that your personal identifiable information is only shared in cases where disclosure is mandatory under relevant laws, government policies and administrative orders. ITDI will never share, sell or otherwise disclose your personal information to other parties outside of those enumerated above, except in instances when you have given your consent to such transfer or disclosure. We use appropriate security measures on how your data is protected and retained. </p>

                  <p align="justify"> The data privacy law forbids other entities and even government agencies from using your data for any other purpose, without your consent. As with any other public internet-based systems, there is always a risk of unauthorized access, so it is very important to protect your device and to contact ITDI if you suspect any unauthorized access to your device. When using shared devices, practice data clearance on web browser cookies and device memory cache. </p>


                  <p align="justify"> ITDI is committed to upholding your rights in relation to your personal information. You have the right to request a copy of your personal data, to correct or modify, erase or withdraw your personal information from any ITDI information systems, database, processes and activities. </p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>

            </div>
          </div>


          <?php
          if ($submittedSuccessfully) {
            Growl::widget([
              'type' => Growl::TYPE_SUCCESS,
              'title' => 'Details Sent!',
              'icon' => 'glyphicon glyphicon-ok-sign',
              'body' => 'Kindly check your emailf for further instruction. Thank you!',
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

          <!-- Modal - END-->

          <?php LoadingOverlayPjax::end(); ?>
          <?php ActiveForm::end(); ?>
          <?php yii\widgets\Pjax::end() ?>
        </div>
      </div>
    </div>
  </div>
</body>

</html>


<!-- Script For Checkbox to enable/disable submit button - START -->
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
<!-- Script For Checkbox to enable/disable submit button - END -->

<!-- Script for Captcha Button - START -->
<script>
  $("#fox").on('click', function(e) {
    //#testimonials-captcha-image is my captcha image id
    $("img[id$='-captcha-image']").trigger('click');
    e.preventDefault();
  })
</script>

<?php
//LOADING OVERLAY
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

<script>
  $("#psubcat-id").on("change", function() {
    if ($(this).val() != "") {
      $("#quantity").prop("disabled", false);
    } else {
      $("#quantity").prop("disabled", true);
    }
  });
</script>
<!-- <script>
  $('#service_button').on('click', function(){
    var hasAuthLetter = $('input[name="hasAuthLetter"]:checked').val();
    var tn = $('#service_button').val();
    console.log(hasAuthLetter);

    $.ajax({
      url: "<?= Url::to(['usersprofile/create']) ?>",
      type: 'get',
      data: {
        hasAuthLetter:hasAuthLetter,
        tn:tn

      }
    })
  })

</script> -->