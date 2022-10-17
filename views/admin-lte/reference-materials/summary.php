<?php

use app\models\ptservices\PtCodeRequest;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;
use timurmelnikov\widgets\LoadingOverlayPjax;
use kartik\growl\Growl;
use yii\helpers\ArrayHelper;


$this->title = 'RMs Summary';
$this->params['breadcrumbs'][] = $this->title;

use app\models\ptservices\PtServices;
use app\models\referencematerials\PtRmCodeRequest;
use johnitvn\ajaxcrud\CrudAsset;

CrudAsset::register($this);

?>
<style>
  .panel-success>.panel-heading {
    color: #3c763d;
    background-color: #dff0d8;
    border-color: #d6e9c6;
  }

  .table>thead>tr>th,
  .table>tbody>tr>th,
  .table>tfoot>tr>th,
  .table>thead>tr>td,
  .table>tbody>tr>td,
  .table>tfoot>tr>td {
    padding: 8px;
    line-height: 1.42857143;
    vertical-align: top;
    border-top: 1px solid #ddd;
  }

  .table-bordered {
    border: 1px solid #ddd;
  }
</style>

<div class="container">

  <div class="col-lg-12">
    <p>
      <br>


      <label style="padding-bottom: 20px; padding-top:20px">
        <p class="title-caption">Your request has been submitted!</p>
      </label>

    </p>
    <div class="panel panel-success" style="background-color: #d1d8e0;">
      <div class="panel-heading" style="background-color: tranparent;">
        <i class="glyphicon glyphicon-list"></i>&nbsp;&nbsp;<b>Summary of your request</b>

      </div>
      <div class="panel panel-success" style="background-color: #fff;">

        <div class="table-responsive">
          <table class="kv-grid-table table  table-striped kv-table-wrap">
            <thead class="table-bordered" style="color: #1e272e;">
              <tr>

                <th class="table-bordered" style="text-align:center">Year</th>
                <!-- <th class="table-bordered" style="text-align:center">Category</th> -->
                <th class="table-bordered" style="text-align:center">PT Code and <br>Description</th>
                <!-- <th class="table-bordered" style="text-align:center">Target Analytes</th> -->
                <!-- <th class="table-bordered" style="text-align:center">Start Date</th> -->
                <th class="table-bordered" style="text-align:center">Unit <br> Quantity</th>
                <th class="table-bordered" style="text-align:center">Quantity</th>
                <th class="table-bordered" style="text-align:center">Price</th>

              </tr>
            </thead>



            <?php $code = PtRmCodeRequest::find()->where(['request_id' => $request['id']])->all();
            // var_dump($test2);die;
            foreach ($code as $service) :
            ?>
              <tbody>
                <tr style="text-align: center;">
                  <td class="table-bordered"><?= $service->materials->year_generated ?></td>
                  <td class="table-bordered"><?= $service->materials->prm_code ?></td>
                  <td class="table-bordered"><?= $service->materials->quantity ?>x<?= $service->materials->unit ?></td>
                  <td class="table-bordered"><?= $service->quantity ?></td>
                  <td class="table-bordered"><?= $service->materials->price ?></td>
                </tr>
              </tbody>
            <?php endforeach; ?>
          </table>

          <div class="form-group" style="padding-left:970px; padding-top:10px; color:#1e272e">
            <p><b>Total Fee:</b> <?php $total = PtRmCodeRequest::find()->where(['request_id' => $request['id']])->all();
 
                                  $sum = 0;
                                  foreach ($total as $value) {
                                    $values = $value->total_fee;
                                    $sum += $values;
                                  }
                                  echo number_format($sum); ?></p>
          </div>
        </div>


      </div>
      <div class="form-group pull-right" style="padding-left:5px; padding-top:10px; color:#fff">


        <?= Html::a('&nbsp;&nbsp;&nbsp; <span class="glyphicon glyphicon-download-alt" aria-hidden="true"></span> &nbsp; Generate PDF &nbsp;&nbsp;&nbsp;', ['rmprint', 'id' => $ptcode->id], ['target' => '_blank', 'class' => 'btn btn-success']); ?>
      </div>
    </div>
  </div>
</div>
</div>

<?php Modal::begin([
  "id" => "ajaxCrudModal",
  "footer" => "", // always need it for jquery plugin
]) ?>
<?php Modal::end(); ?>

<script>
  $(function() {
    $('#someid_1').click(function() {
      var id = $(this).attr('id');
      alert(id);
    });
  });
</script>