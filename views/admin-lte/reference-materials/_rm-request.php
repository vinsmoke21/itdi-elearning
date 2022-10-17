<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\backend\Seminars;
use yii\widgets\Pjax;
use timurmelnikov\widgets\LoadingOverlayPjax;
use aryelds\sweetalert\SweetAlert;

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
        'action' => ['request'],
        'options' => ['data-pjax' => true]
      ]
    ); ?>
    <?php LoadingOverlayPjax::begin([
      'color' => 'rgba(255, 102, 255, 0.3)',
      'fontawesome' => 'fa fa-cog fa-spin'
    ]); ?>

    <div class="panel panel-success">
      <div class="panel-heading">
        <i class="glyphicon glyphicon-user"></i>&nbsp;&nbsp;<b>Please enter your basic information:</b>
      </div>
      <div style="padding: 10px 20px; margin-top:10px">

        <?= Html::hiddenInput('selected_ids', null, ['id' => 'selected_ids']) ?>
        

        <?= $form->field($model, 'name', [
          'options' => ['class' => 'has-float-label'],
          'labelOptions' => [''],
          'template' => '{input}{label}{error}{hint}',
        ],)->textInput(['maxlength' => true, 'placeholder' => 'Enter your full name']) ?>

        <?= $form->field($model, 'position', [
          'options' => ['class' => 'has-float-label', 'style' => 'margin-top:20px'],
          'template' => '{input}{label}{error}{hint}',
        ],)->textInput(['maxlength' => true, 'placeholder' => 'Enter your position']) ?>

        <?= $form->field($model, 'company_name', [
          'options' => ['class' => 'has-float-label', 'style' => 'margin-top:20px'],
          'template' => '{input}{label}{error}{hint}',
        ],)->textInput(['maxlength' => true, 'placeholder' => 'Enter your company']) ?>

        <?= $form->field($model, 'address_1', [
          'options' => ['class' => 'has-float-label', 'style' => 'margin-top:20px'],
          'template' => '{input}{label}{error}{hint}',
        ],)->textarea(['maxlength' => true, 'placeholder' => 'Enter your company address']) ?>

        <?= $form->field($model, 'delivery_address', [
          'options' => ['class' => 'has-float-label', 'style' => 'margin-top:20px'],
          'template' => '{input}{label}{error}{hint}',
        ],)->textarea(['maxlength' => true, 'placeholder' => 'Enter your company address']) ?>

        <?= $form->field($model, 'city', [
          'options' => ['class' => 'has-float-label', 'style' => 'margin-top:20px'],
          'labelOptions' => [''],
          'template' => '{input}{label}{error}{hint}',
        ],)->textInput(['maxlength' => true, 'placeholder' => 'Enter your municipality']) ?>

        <?= $form->field($model, 'postal_code', [
          'options' => ['class' => 'has-float-label', 'style' => 'margin-top:20px'],
          'labelOptions' => [''],
          'template' => '{input}{label}{error}{hint}',
        ],)->textInput(['maxlength' => true, 'placeholder' => 'Enter your postal id']) ?>

        <?= $form->field($model, 'country', [
          'options' => ['class' => 'has-float-label', 'style' => 'margin-top:20px'],
          'labelOptions' => [''],
          'template' => '{input}{label}{error}{hint}',
        ],)->textInput(['maxlength' => true, 'placeholder' => 'Enter your country']) ?>

        <?= $form->field($model, 'email_address', [
          'options' => ['class' => 'has-float-label', 'style' => 'margin-top:20px'],
          'labelOptions' => [''],
          'template' => '{input}{label}{error}{hint}',
        ],)->textInput(['type' => 'email', 'placeholder' => '@gmail.com']) ?>

        <?= $form->field($model, 'mode_of_payment', [
          'options' => ['class' => 'has-float-label', 'style' => 'margin-top:20px'],
          'labelOptions' => ['class' => ''],
          'template' => '{input}{label}{error}{hint}',
        ],)->dropDownlist(
          ['1' => 'Epayment', '2' => 'Over the Counter'],
          ['prompt' => 'Please select...']
        ) ?>

        <?= $form->field($model, 'tel_no', [
          'options' => ['class' => 'has-float-label', 'style' => 'margin-top:20px'],
          'labelOptions' => [''],
          'template' => '{input}{label}{error}{hint}',
        ],)->textInput(['maxlength' => true, 'placeholder' => 'Enter your company telephone no.']) ?>

        <?= $form->field($model, 'fax_no', [
          'options' => ['class' => 'has-float-label', 'style' => 'margin-top:20px'],
          'labelOptions' => [''],
          'template' => '{input}{label}{error}{hint}',
        ],)->textInput(['maxlength' => true, 'placeholder' => 'Enter your company fax no.']) ?>

      </div>
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
        </div>
      </div>
    </div>

    <div class="vin">
      <div class="col-md-12">

        <div class="pull-right" style="margin:5px;">
          <?= Html::submitButton('Submit', ['class' => 'btn btn-success', 'id' => 'service_button']) ?>
        </div>
      </div>
    </div>
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

    $('#modal-form').on('submit', function() {

      let selected_cb = "";

      $('.cb-services:checked').each(function() {
          let quantity = $(this).closest('tr').find('.qtinput').val();
          let id = $(this).val();
        selected_cb += `${id}:${quantity},`;
      });

      $('#selected_ids').attr('value', selected_cb);
      // console.log($('#selected_ids').val());
      return true;
    });
  });
</script>

<!-- Script for Captcha Button - START -->
<script>
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