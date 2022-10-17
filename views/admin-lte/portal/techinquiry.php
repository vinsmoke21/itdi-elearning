<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\backend\Techtransfer;
use yii\widgets\Pjax;

use timurmelnikov\widgets\LoadingOverlayPjax;

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    /* The Modal (background) */
    .modal {
      display: none;
      /* Hidden by default */
      position: fixed;
      /* Stay in place */
      left: 0;
      top: 0;
      width: 100%;
      /* Full width */
      height: 100%;
      /* Full height */
      overflow: auto;
      /* Enable scroll if needed */
      background-color: rgb(0, 0, 0);
      /* Fallback color */
      background-color: rgba(0, 0, 0, 0.4);
      /* Black w/ opacity */
    }

    /* Modal Content */
    .modal-content {
      position: relative;
      background-color: #fefefe;
      margin: auto;
      padding: 0;
      border: 1px solid #888;
      width: 100%;
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
      -webkit-animation-name: animatetop;
      -webkit-animation-duration: 0.4s;
      animation-name: animatetop;
      animation-duration: 0.4s
    }

    /* Add Animation */
    @-webkit-keyframes animatetop {
      from {
        top: -300px;
        opacity: 0
      }

      to {
        top: 0;
        opacity: 1
      }
    }

    @keyframes animatetop {
      from {
        top: -300px;
        opacity: 0
      }

      to {
        top: 0;
        opacity: 1
      }
    }

    /* The Close Button */
    .close {
      color: white;
      float: right;
      font-size: 28px;
      font-weight: bold;
    }

    .close:hover,
    .close:focus {
      color: #000;
      text-decoration: none;
      cursor: pointer;
    }

    .modal-header {
      padding: 2px 18px;
      background-color: #5cb85c;
      color: white;
    }

    .modal-body {
      padding: 2px 16px;
    }

    .modal-footer {
      padding: 2px 16px;
      background-color: #5cb85c;
      color: white;
    }
  </style>
  <div class="row">
    <div class="customer-form">
      <?php yii\widgets\Pjax::begin(['id' => 'new_country']) ?>
      <?php $form = ActiveForm::begin(
        [
          'id' => 'modal-form',
          'action' => ['technology-details'],
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
        <div style="padding: 10px 20px">
          <div class="row" style="padding-bottom: 10px; padding-top: 10px">
            <div class="col-md-6">



              <?= Html::hiddenInput('id', $_GET['id']); ?>
              <?= $form->field($techinquiry, 'name', [
                'options' => ['class' => 'has-float-label'],
                'labelOptions' => ['class' => ''],
                'template' => '{input}{label}{error}{hint}',
              ],)->textInput(['maxlength' => true, 'placeholder' => 'enter your full name']) ?>
            </div>
            <div class="col-md-6">
              <?= $form->field($techinquiry, 'company', [
                'options' => ['class' => 'has-float-label'],
                'labelOptions' => ['class' => ''],
                'template' => '{input}{label}{error}{hint}',
              ],)->textInput(['maxlength' => true, 'placeholder' => 'enter company']) ?>

            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <?= $form->field($techinquiry, 'contact_number', [
                'options' => ['class' => 'has-float-label'],
                'labelOptions' => ['class' => ''],
                'template' => '{input}{label}{error}{hint}',
              ],)->textInput(['maxlength' => true, 'placeholder' => 'enter contact number', 'pattern' => '\d*']) ?>
            </div>
            <div class="col-md-6">
              <?= $form->field($techinquiry, 'nature_of_business', [
                'options' => ['class' => 'has-float-label'],
                'labelOptions' => ['class' => ''],
                'template' => '{input}{label}{error}{hint}',
              ],)->dropDownList(
                [
                  'Entrepreneurship' => 'Entrepreneurship', 'Finance' => 'Finance', 'Human Rosources' => 'Human Rosources',
                  'Marketing' => 'Marketing', 'Operations' => 'Operations', 'Strategy' => 'Strategy', 'Supply Chain' => 'Supply Chain',
                  'Business Intelligence' => 'Business Intelligence', 'Markets' => 'Markets', 'Economy' => 'Economy',
                  'Demography' => 'Demography', 'Technology' => 'Technology', 'Monetary Aspects' => 'Monetary Aspects', 'Government Policy'
                  => 'Government Policy', 'Political Influence' => 'Political Influence', 'Competition' => 'Competition', 'Products and Services'
                  => 'Products and Services'
                ],
                ['prompt' => 'Please select...']
              ) ?>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <?= $form->field($techinquiry, 'address', [
                'options' => ['class' => 'has-float-label'],
                'labelOptions' => ['class' => ''],
                'template' => '{input}{label}{error}{hint}',
              ],)->textarea(['maxlength' => true, 'placeholder' => 'enter address']) ?>
            </div>

            <div class="col-md-6">
              <?= $form->field($techinquiry, 'email', [
                'options' => ['class' => 'has-float-label'],
                'labelOptions' => ['class' => ''],
                'template' => '{input}{label}{error}{hint}',
              ],)->textarea(['maxlength' => true, 'placeholder' => '@gmail.com', 'type' => 'email']) ?>
            </div>
          </div>
          <?= $form->field($techinquiry, 'message')->textarea(['rows' => '5']) ?>
        </div>
      </div>

      <div class="panel panel-info">
        <div class="panel-heading">
          <i class="glyphicon glyphicon-pencil"></i>&nbsp;&nbsp;<b>Additional Information</b>
        </div>
        <div style="padding: 10px 20px">
          <div class="row">
            <div class="col-md-6">
              <?= $form->field($techinquiry, 'meeting')->dropDownList(
                ['Yes' => 'Yes', 'No' => 'No'],
                ['prompt' => 'Please select...']
              ); ?>
            </div>

            <div class="col-md-6">
              <?= $form->field($techinquiry, 'engagement_type')->dropDownList(
                ['Personal' => 'Personal', 'Virtual' => 'Virtual'],
                ['prompt' => 'Please select...']
              ); ?>
            </div>

            <div class="col-md-6">
              <?= $form->field($techinquiry, 'date')->input('date'); ?>
            </div>

          </div>
          <!-- Verification Code, Captcha - START -->
        </div>
      </div>

      <div class="row">
        <div class="col-md-12" role="tab" id="headingTwo">
          <h5 align="center">
            <label>
              <input type="checkbox" id="service_check" />
              By clicking this box, you agree to the
              <a onclick="window.open('https://itdi.dost.gov.ph/images/TransparencySeal/DPA/Data-Privacy-Notice.pdf?fbclid=IwAR0DKLTkfabhTvIqWKkwvVbGVmld1jlEGexLn0vWERTw6CD40nqdhWhwBto', '_blank')">Data Privacy Policy</a>
              and
              <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                Terms and Conditions
              </a>
              of ITDI
            </label>
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
            <?= Html::submitButton('Submit', ['class' => 'btn btn-success', 'id' => 'service_button', 'disabled' =>
            'disabled']) ?>
          </div>
        </div>
      </div>
      <?php LoadingOverlayPjax::end(); ?>
      <?php ActiveForm::end(); ?>
      <?php yii\widgets\Pjax::end() ?>
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

    // <!-- LOADING BUTTON -->
    $('.ex').on('click', function() {
      var $this = $(this);
      $this.button('loading');
      setTimeout(function() {
        $this.button('reset');
      }, 10000);
    });
  </script>

  <?php
  $this->registerJs(
    <<< JS
  $(document).on('pjax:send', function () {
    var modal_button = $(this);
    modal_button.button('loading');
  }).on('pjax:complete', function() {
    var modal_button = $(this);
    modal_button.button('reset');
  });
JS
  );
  ?>

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