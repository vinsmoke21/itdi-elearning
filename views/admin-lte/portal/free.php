<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\backend\Seminars;
use app\models\backend\Trainings;
use app\models\customer\ChecklistTraining;
use app\models\customer\Region;
use yii\widgets\Pjax;
use timurmelnikov\widgets\LoadingOverlayPjax;
use aryelds\sweetalert\SweetAlert;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use kartik\growl\Growl;
?>

<style>
  .modal-body {
    padding: 1px 16px;
  }
</style>

<div class="row">
  <div class="customer-form">
    <?php yii\widgets\Pjax::begin(['id' => 'new_country']) ?>
    <?php $form = ActiveForm::begin(
      [
        'id' => 'modal-form',
        'action' => ['training-details'],
        'options' => ['data-pjax' => true]
      ]
    ); ?>

    <?php LoadingOverlayPjax::begin([
      'color' => 'rgba(255, 102, 255, 0.3)',
      'fontawesome' => 'fa fa-cog fa-spin'
    ]); ?>

    <div class="panel panel-success">
      <div class="panel-heading">
        <i class="glyphicon glyphicon-user"></i>&nbsp;&nbsp;<b>Participants Profile:</b>
      </div>
      <div style="padding: 10px 20px">
        <div class="row">
          <div style="padding: 10px 20px; margin-top:10px">
            <?= Html::hiddenInput('id', $_GET['id']);

            ?>
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

          <div class="panel panel-success">
            <div class="panel-heading">
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

          <div class="panel panel-success">
            <div class="panel-heading">
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

          <div class="panel panel-success">
            <div class="panel-heading">
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
              $tbl_trainings = Trainings::find()->where(['id' => $_GET['id']])->one();

              if ($tbl_trainings->id == null) {
                $tbl_seminars = Seminars::find()->where(['id' => $_GET['id']])->one();
                if ($tbl_seminars->mode != '3') : {
                  } ?>
                  <?= $form->field($model, 'food_restriction', [
                    'options' => ['class' => 'has-float-label', 'style' => 'margin-top:20px'],
                    'labelOptions' => [''],
                    'template' => '{input}{label}{error}{hint}',
                  ],)->textInput(['maxlength' => true, 'placeholder' => '(e.g., pork, shrimp, chicken, etc.)']) ?>

                <?php endif;
              }
              //  for trainings 
              if ($tbl_trainings->id != null) {
                if ($tbl_trainings->mode != '3') : {
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

          <!-- condition for training background list start -->
          <?php
          $tbl_trainings = Trainings::find()->where(['id' => $_GET['id']])->one();
          if ($tbl_trainings->id != null) {

            $check = ChecklistTraining::find()->where(['training_id' => $tbl_trainings['id']])->one();
            if ($check != null) : {
              } ?>
              <div class="panel panel-success">
                <div class="panel-heading">
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

          //  for seminars 
          if ($tbl_trainings->id == null) {
            $tbl_seminars = Seminars::find()->where(['id' => $_GET['id']])->one();
            $checkS = ChecklistTraining::find()->where(['seminar_id' => $tbl_seminars['id']])->one();
            if ($checkS != null) : {
              } ?>
              <div class="panel panel-success">
                <div class="panel-heading">
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
          ?>
          <!-- condition for training background list end-->

        </div>
        <div class="row">
          <div class="col-md-12" role="tab" id="headingTwo">
            <h5 align="center">
              <input type="checkbox" id="service_check" />
              By clicking this box, you would agree to the
              <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                Terms and Conditions
              </a>
              of ITDI
            </h5>

            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
              <div class="panel-body">
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
          <div class="col-md-12">

            <div class="pull-right" style="margin-top:10px;">
              <?= Html::submitButton('Submit', ['class' => 'btn btn-success', 'id' => 'service_button', 'disabled' =>
              'disabled']) ?>
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


      <?php LoadingOverlayPjax::end(); ?>
      <?php ActiveForm::end(); ?>
      <?php yii\widgets\Pjax::end() ?>
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

  $(document).on({
    ajaxStart: function() {
      $('#categoryAjax').empty().html();
      $('#categoryAjax').append('<div class="row"><div class="col-xs-4 col-xs-offset-4"><div class="loader"></div></div></div>');
    },
    // ajaxStop: function(){ 
    //     $('.loader')
    // }    
  });
</script>

<!-- Script for Captcha Button - START -->
<script>
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

  $("#fox").on('click', function(e) {
    //#testimonials-captcha-image is my captcha image id
    $("img[id$='-captcha-image']").trigger('click');
    e.preventDefault();
  })

  $('#modal-form').on('submit', function() {
    // alert('Error');
    // return false;
  })
</script>
<!-- Script for Captcha Button - END -->

<?php
//LOADING OVERLAY
$script = <<< JS
    $(document).ajaxSend(function(event, jqxhr, settings){
        $("#p0").LoadingOverlay("show");
        
    });

   
    $(document).ajaxComplete(function(event, jqxhr, settings){
        $("#p0").LoadingOverlay("hide");
        
    });

JS;

$this->registerJs($script, yii\web\View::POS_READY);

?>