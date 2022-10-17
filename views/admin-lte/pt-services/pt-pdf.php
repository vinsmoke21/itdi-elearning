<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\ArrayHelper;
use kartik\mpdf\Pdf;
use app\models\Calibration;
use app\models\RfSampleParticulars;
use app\models\ModeOfPayment;
use app\models\ptservices\PtCategories;
use app\models\ptservices\PtCodeRequest;
use app\models\ptservices\PtRequest;
use app\models\ptservices\PtServices;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;

$session = Yii::$app->session; // To Hide ID
$id = $session->get('ptprint_id'); // To HIde ID
$test2 = PtCodeRequest::findOne($_GET['id']); //select * from Details where id='$_GET['id']'
$detailspdf = PtRequest::find()->where(['id' => $test2['request_id']])->one();
$services = PtServices::find()->where(['id' => $test2['code_id']])->one();
$request = PtRequest::find()->where(['id' => $test2['request_id']])->one();
// var_dump($request->mode_of_payment);die;


if ($request->mode_of_payment = 1) {
  $epayment = 'E-PAYMENT';
} else {
  $cash = 'OVER THE COUNTER';
}


?>

<html>

<head>
</head>

<body>
  <div class="move-me">
    <img src="favicon.png">
  </div>

  <div class="control">
    <div class="dost1" id="dost1">
      <p>Republic of the Philippines</p>
      <p>Department of Science and Technology</p>
      <h5><b>INDUSTRIAL TECHNOLOGY DEVELOPMENT INSTITUTE</b></h5>
      <p>DOST Compound., General Santos Ave., Bicutan, Taguig City</p>
      <p>Tel. Nos. : 837-2071 to 82; Telefax No.: 837-3167; 837-6150</p>
      <p>http//www.itdi.dost.gov.ph</p><br>
      <p><b>REQUEST FOR NATIONAL METROLOGY TECHNICAL SERVICES</b></p>
      <p>(with standarized fees)</p>
      <br>
      <table>
        <tr>
          <td style="padding-left:515px;"></td>
          <td>Date:</td>
          <td style="border-bottom: 1px solid black; width: 120px;">
            <center><?= date("Y-M-d"); ?> </center>
          </td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
      </table>
      <div class="info1" id="info1">

        <table>
          <tr>
            <td class="bold">Transaction Number: </td>
            <td style="width: 10px;"></td>
            <td style="border-bottom: 1px solid black; width: 150px;">
              <?= Html::hiddenInput('id', $_GET['id']); ?>
              <center><?= $detailspdf->transaction_number ?></center>
            </td>
          </tr>
        </table>

        <table>
          <tr>
            <td class="label2 bold" style="padding-right:60px;">Customer Name:</td>
            <td style="border-bottom: 1px solid black; width: 150px;"><?= $detailspdf['name'] ?></td>
            <td style="width: 95px;"> </td>
            <td class="label2 bold">Company No.:</td>
            <td style="border-bottom: 1px solid black; width: 150px;"><?= $detailspdf['tel_no'] ?></td>
          </tr>
        </table>
        <table>
          <tr>
            <td class="bold" style="border-style: none;">Company Address:</td>
            <td style="border-bottom: 1px solid black; width: 610px;"><?= $detailspdf['address_1'] ?></td>

          </tr>
        </table>
        <table>
          <tr>
            <td class="label2 bold" style="padding-right:25px;">Company Name:</td>
            <td style="border-bottom: 1px solid black; width: 150px;"><?= $detailspdf['company_name'] ?></td>
            <td style="width: 100px;"> </td>
            <td class="label2 bold">Designation:</td>
            <td style="border-bottom: 1px solid black; width: 150px;"><?= $detailspdf['position'] ?></td>
          </tr>
        </table>
        <table>
          <tr>
            <td class="label2 bold" style="padding-right:35px;">Email Address: </td>
            <td style="border-bottom: 1px solid black; width: 150px;"><?= $detailspdf['email_address'] ?></td>
            <td style="width: 115px;"> </td>
            <td class="label2 bold">Delivery Address:</td>
            <td style="border-bottom: 1px solid black; width: 150px;"><?= $detailspdf['delivery_address'] ?></td>
          </tr>
        </table>

        <br>

        <h4>PT Code Requested</h4>
        <hr />
        <table class="table table-bordered" id="particularsTable" style=" border: 1px solid black; ">

          <thead>
            <tr>
              <th style="width: 250px; border-left: 1px solid black; border-right: 1px solid black; border-bottom: 1px solid black; border-top    : 1px solid black;">Year</th>

              <th style="width: 250px; border-left: 1px solid black; border-right: 1px solid black; border-bottom: 1px solid black; border-top    : 1px solid black;">Category</th>

              <th style="width: 250px; border-left: 1px solid black; border-right: 1px solid black; border-bottom: 1px solid black; border-top    : 1px solid black;">PT Code</th>

              <th style="width: 250px; border-left: 1px solid black; border-right: 1px solid black; border-bottom: 1px solid black; border-top    : 1px solid black;">Unit Quantity</th>

              <th style="width: 250px; border-left: 1px solid black; border-right: 1px solid black; border-bottom: 1px solid black; border-top    : 1px solid black;">Price</th>

            </tr>
          </thead>
          <tbody id="particularsBody">

            <?php $test2 = PtCodeRequest::find()->where(['request_id' => $request['id']])->all();
            foreach ($test2 as $service) :
            ?>
              <tr>
                <td style="border-left: 1px solid black; border-right: 1px solid black; border-bottom: 1px solid black; border-top    : 1px solid black;">
                  <center> <?php echo $service->services->year ?> </center>
                </td>

                <td style="border-left: 1px solid black; border-right: 1px solid black; border-bottom: 1px solid black; border-top    : 1px solid black;">
                  <center> <?php echo $service->category->target_analytes ?> </center>
                </td>

                <td style="border-left: 1px solid black; border-right: 1px solid black; border-bottom: 1px solid black; border-top    : 1px solid black;">
                  <center> <?php echo $service->services->pt_code ?> </center>
                </td>

                <td style="border-left: 1px solid black; border-right: 1px solid black; border-bottom: 1px solid black; border-top    : 1px solid black;">
                  <center> <?php echo $service->services->unit_quantity ?> </center>
                </td>

                <td style="border-left: 1px solid black; border-right: 1px solid black; border-bottom: 1px solid black; border-top    : 1px solid black;">
                  <center> <?php echo $service->services->price ?> </center>
                </td>
              </tr>

            <?php endforeach; ?>

          </tbody>

        </table>
        <br>


        <br>


        <br>

        <table>
          <tr>
            <td class="invisible"></td>
            <!-- <table class="invisible" style="padding-left: 0px;"> -->

          <tr>
            <td style="height:100px;">
              <!-- insert remarks here -->
            </td>
          </tr>
          <tr>
          <tr>
            <td><strong> Total price quotation:</strong>
              <font style="font-size:10px;"><i>(Price may vary depending on the final validation)</i></font>
            </td>
            <td style="border-bottom: 1px solid black; width: 100px;">
              <center><b>PHP</b> <?php $group = PtCodeRequest::find()->where(['request_id' => $request['id']])->all();

                                  $sum = 0;
                                  foreach ($group as $value) {
                                    $values = $value->amount;
                                    $sum += $values;
                                  }
                                  echo number_format($sum); ?></p>
              </center>
            </td>
          </tr>

          </tr>
          <tr>
            <td><strong> Preferred Mode of Payment: </td>
            <td style="border-bottom: 1px solid black; text-align:center; width: 150px;">
              </strong><?php if ($request->mode_of_payment == 1) {
                          echo $epayment;
                        } else {
                          echo $cash;
                        } ?></td>
          </tr>

          </td>
          </tr>

        </table>


        <br>
</body>

</html>