<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;
use app\models\customer\CustomerType;
use app\models\customer\IndustryType;
use yii\helpers\ArrayHelper;


$this->registerCssFile('@web/css/details.css');
$this->registerCssFile('@web/css/home/main.css');

$this->title = 'ITDI | Inquiry';
$this->params['breadcrumbs'][] = $this->title;

?>

<meta name="viewport" content="width=device-width, initial-scale=1" /> 
<html>
  <body>
  <div class="rf-sample-details-form">
  <div class="container" style="margin-top: 100px">
        <h3 class="features-title">Kindly fill out the following details to proceed with the transaction:</h3>
        <h5><i> &nbsp; Please complete all fields marked with <b style="color: red;">*</b></i><h5>
    <div class="row">          
    <div class="customer-form">
                <?php $form = ActiveForm::begin(); ?>
                <div class="panel panel-success">
                        <div class="panel-heading">
                                <i class="glyphicon glyphicon-user"></i>&nbsp;&nbsp;<b>Request Form</b>
                        </div>
                        <div style="padding: 10px 20px">
                            <div class="row">
                              <div class="col-md-4">
                              <label> Calibration Name </label>
                              <?= Html::input('text', 'calibration_name', $calibrationModel->sample_name, ['readonly' => true, 'class' => 'form-control']) ?>
                              <?= $form->field($model, 'cal_id')->hiddenInput(['value' => $calibrationModel->id])->label(false) ?>
                              </div>
                              <div class="col-md-4">
                              <label> Particular Name </label>
                              <?= Html::input('text', 'particular_name', $particularModel->range_capacity, ['readonly' => true,'class' => 'form-control' ]) ?>
                              <?= $form->field($model, 'part_id')->hiddenInput(['value' => $calibrationModel->id])->label(false) ?>
                              </div>
                              <div class="col-md-4">
                              <?= $form->field($model, 'quantity')->textInput(['value' => ($quantity), 'type' => 'number', 'min' => '0', 'onkeypress' => 'return event.charCode >= 48']) ?>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-4">
                              <?= $form->field($model, 'customer_name')->textInput(['placeholder' => 'Full Name', 'pattern' => '[a-zA-Z\s]*']) ?>
                              </div>
                              <div class="col-md-8">
                              <?= $form->field($model, 'address')->textarea(['rows' => 6])?>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-4">
                              <?= $form->field($model, 'contact')->textInput(['placeholder' => 'Input Contact Number', 'pattern' => '\d*']) ?>
                              </div>
                              <div class="col-md-4">
                              <?= $form->field($model, 'email')->textInput(['placeholder' => '@gmail.com', 'type' => 'email'])  ?>
                              </div>
                              <div class="col-md-4">
                              <?= $form->field($model, 'purpose')->textarea(['rows' => 6]) ?>
                              </div>
                              <div class="col-md-4">
                                <?= $form->field($model, 'customer_type')->dropDownList(
                                       ArrayHelper::map(CustomerType::find()->all(), 'id', 'customer_type'), 
                                       [
                                        'prompt'=>'Select customer type...', 
                                        'id' => 'cat-id'
                                       ]
                                    ) ?>
                              </div>
                              <div class="col-md-4">
                              <?= $form->field($model, 'industry_type')->dropDownList(
                                       ArrayHelper::map(IndustryType::find()->all(), 'id', 'industry_type'), 
                                       [
                                        'prompt'=>'Select industry type...', 
                                        'id' => 'cat-id'
                                       ]
                                    ) ?>
                              </div>
                              <div class="col-md-4">
                              <?= $form->field($model, 'requesting_official')->textInput(['maxlength' => true]) ?>
                              </div>
                              <div class="col-md-4">
                              <?= $form->field($model, 'position')->textInput(['maxlength' => true]) ?>
                              </div>
                              <div class="col-md-4">
                              <?= $form->field($model, 'sample_brought_by')->textInput(['maxlength' => true]) ?>
                              </div>
                              <div class="col-md-4">
                              <?= $form->field($model, 'special_request')->textInput(['maxlength' => true]) ?>
                              </div>
                              <div class="col-md-12">
                              <?= $form->field($model, 'equipment_description')->textarea(['rows' => 6]) ?>
                              </div>
                            </div>
                           
                        </div>
                </div>

    

                <div>
	                <input type="checkbox" id="service_check"/>
	                <label>
	                  By checking this box, you would agree to the <a data-toggle="modal" data-target="#myModal" >Terms and Conditions</a> of ITDI.
	                </label>
          		</div>

              <div class="form-group">
                  <?= Html::submitButton('Submit', ['class' => 'btn btn-success', 'id' => 'service_button', 'disabled' => 'disabled']) ?> &nbsp;
                  <a href="http://localhost/itdi-ts/web/site/login" class="btn btn-primary" style=""><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Back&nbsp;&nbsp;</a>
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
                  <p align="justify"> Industrial Technology Development Institute (ITDI) respect your right to privacy and want you to inform you how we collect, use, and share your personal information. In compliance with the Republic Act No. 10173, otherwise known as the Data Privacy Act of 2012 ("DPA"), this privacy policy covers the data processing activities of ITDI. Policy applies when you use any ITDI online and on premise information systems in acquiring government services provided by ITDI. The following data will be collected from you when you transact or register in any ITDI services systems: Full Name, Company Name, Company Designation, Contact Information such as mobile no., landline, no., fax no and email address both official and personal, Home or Office Address, Customer Type, Business Industry Type, transaction details and other information needed to process your transaction.  To facilitate online transaction, ITDI acquired hosting of transaction process and data storage to a third party provider. ITDI also uses a free third party email provider to facilitate online communication to our customer, manual and auto-generated sending. Additionally, in the course of the rendering of services, your information may be shared to other government agencies for our compliance and to private companies for promotional activities. Rest assured that your personal identifiable information is only shared in cases where disclosure is mandatory under relevant laws, government policies and administrative orders. ITDI will never share, sell or otherwise disclose your personal information to other parties outside of those enumerated above, except in instances when you have given your consent to such transfer or disclosure. We use appropriate security measures on how your data is protected and retained. </p>

                  <p align="justify"> The data privacy law forbids other entities and even government agencies from using your data for any other purpose, without your consent. As with any other public internet-based systems, there is always a risk of unauthorized access, so it is very important to protect your device and to contact ITDI if you suspect any unauthorized access to your device. When using shared devices, practice data clearance on web browser cookies and device memory cache. </p>


                  <p align="justify"> ITDI is committed to upholding your rights in relation to your personal information. You have the right to request a copy of your personal data, to correct or modify, erase or withdraw your personal information from any ITDI information systems, database, processes and activities. </p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>

            </div>
          </div>
          <!-- Modal - END-->


          <?php ActiveForm::end(); ?>

      </div>
    </div>
  </div>
</div>
<!-- <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="ri-arrow-up-s-line"></i></a> -->

</body>
</html>
        

<!-- Script For Checkbox to enable/disable submit button - START -->
<script type="text/javascript">
$(function(){
  $("#service_check").change(function(){
    var st = this.checked;
    if (st) {
      $("#service_button").prop("disabled", false);
    }
    else {
      $("#service_button").prop("disabled", true);
    }
  });
});


</script>
<!-- Script For Checkbox to enable/disable submit button - END -->

<!-- Script for Captcha Button - START -->
<script>
  $("#fox").on('click',function(e){
    //#testimonials-captcha-image is my captcha image id
    $("img[id$='-captcha-image']").trigger('click');
    e.preventDefault();
  })
</script>


<style>
  table {
    width: 300px;
    border-collapse: collapse;
}
table, th, td {
    border: 1px solid black;
}
th, td {
    padding: 10px;
    text-align: left;
}
</style>




