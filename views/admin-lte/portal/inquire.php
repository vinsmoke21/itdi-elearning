<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;
use timurmelnikov\widgets\LoadingOverlayPjax;
use kartik\growl\Growl;
use wbraganca\dynamicform\DynamicFormWidget;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;

$this->registerCssFile('@web/css/style.css');
$this->registerCssFile('@web/css/home/main.css');
$this->registerCssFile('@web/css/nav.css');
$this->registerCssFile('@web/css/details.css');
$this->title = 'ITDI | Inquiry';
$this->params['breadcrumbs'][] = $this->title;

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
    <h3 class="features-title">Inquiry</h3>
    <p class="title-caption">Get answers to your queries</p>
    <div class="row">
      <div class="col" style="background-color: white; margin-bottom: 10px; padding: 20px 30px;">

        <div class="customer-form" style="padding-bottom: 20px;">
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
            <div class="panel-heading" style="background-color: #2d98da; color:white">
              <i class="glyphicon glyphicon-user"></i>&nbsp;&nbsp;<b>Contact Information</b>
            </div>
            <div style="padding: 10px 20px; margin-top:10px">
              <?= $form->field($tblinquiry, 'name', [
                'options' => ['class' => 'has-float-label'],
                'labelOptions' => [''],
                'template' => '{input}{label}{error}{hint}',
              ],)->textInput(['maxlength' => true, 'placeholder' => 'Enter your full name']) ?>

              <?= $form->field($tblinquiry, 'contactnum', [
                'options' => ['class' => 'has-float-label', 'style' => 'margin-top:20px'],
                'template' => '{input}{label}{error}{hint}',
              ],)->textInput(['maxlength' => true, 'placeholder' => 'Enter contact number']) ?>

              <?= $form->field($tblinquiry, 'emails', [
                'options' => ['class' => 'has-float-label', 'style' => 'margin-top:20px'],
                'labelOptions' => ['class' => ''],
                'template' => '{input}{label}{error}{hint}',
              ],)->textInput(['type' => 'email', 'placeholder' => '@gmail.com']) ?>

              <?= $form->field($tblinquiry, 'industry', [
                'options' => ['class' => 'has-float-label', 'style' => 'margin-top:20px'],
                'labelOptions' => ['class' => ''],
                'template' => '{input}{label}{error}{hint}',
              ],)->dropDownlist(
                ['Academe' => 'Academe', 'Government' => 'Government', 'Individual' => 'Individual', 'Internal' => 'Internal', 'NGO' => 'NGO', 'Private' => 'Private', 'Student' => 'Student'],
                ['prompt' => 'Please select...']
              ) ?>

              <?= $form->field($tblinquiry, 'address', [
                'options' => ['class' => 'has-float-label', 'style' => 'margin-top:20px'],
                'labelOptions' => ['class' => ''],
                'template' => '{input}{label}{error}{hint}',
              ],)->textarea(['maxlength' => true, 'placeholder' => 'Enter your address']) ?>

            </div>
          </div>

          <div class="panel panel-info">
            <div class="panel-heading" style="background-color: #2d98da; color:white">
              <i class="glyphicon glyphicon-pencil"></i>&nbsp;&nbsp;<b> Additional Information</b>
            </div>
            <div style="padding: 10px 20px; margin-top:10px">
              <?= $form->field($tblinquiry, 'details')->textarea(['rows' => '5']) ?>
              <?= $form->field($tblinquiry, 'suggestions')->textarea(['rows' => '5']) ?>
            </div>
          </div>

          <div>
            <input type="checkbox" id="service_check" />
            <label for="service_check">
              By checking this box, you would agree to the <a data-toggle="modal" style="cursor:pointer" data-target="#myModal">Terms and Conditions</a> of ITDI.
            </label>
          </div>

          <div class="form-group pull-right">
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
              'body' => 'Kindly check your email for further instructions. Thank you!',
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
  <!-- <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="ri-arrow-up-s-line"></i></a> -->
  <?php require('customer/footer.php'); ?>
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