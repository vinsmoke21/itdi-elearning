<?php

use yii\helpers\Html;
use yii\bootstrap\Modal;
use yii\widgets\DetailView;;
use kartik\growl\Growl;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;


$this->title = 'ITDI Portal';
$this->params['breadcrumbs'][] = ['label' => 'list', 'url' => ['list']];
$this->params['breadcrumbs'][] = $this->title;
$this->registerCssFile('@web/css/details.css');
?>


<style>
  .btn {

    color: white;
    font-size: 16px;
    background-color: #10ac84;
    border: none;
  }

  .btn:hover {

    background-color: #333333;
    /*box-shadow: 0 0 50px rgba(0, 0, 0, 0.5);*/
    text-shadow: none;
    color: white;
  }

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
<?php



?>

<!-- ======= Portfolio Details Section ======= -->

<div style="margin-top: 50px; margin-bottom: 100px">
  <section class="portfolio-details container">
    <div class="row gy-4">

        <div class="col-lg-8">
            <div class="thumbnail">
            <img src="<?= Yii::getAlias('@maUrl') . '/' . $pt_materials['image'] ?>" style="width: 100%;">
            </div>
        </div>

        <div class="col-lg-4">
            <div class="portfolio-info">
            <h3>
                <div class="a">
                <h4><?= $pt_materials["analyte_matrix"] ?></h4>
                </div>
            </h3>
            <ul>
                <li><strong>Category:</strong><?= $pt_category->category ?></li><br>
                <li><strong>Fee:</strong><?= $pt_materials['fee']?></li><br>
                <li><strong>Concentraion Range:</strong><?= $pt_materials['concentration_range']?></li><br>
                <li>
                <?= Html::button('Apply', ['value' => Url::to(['/portal/pt-inquiry', 'id' => $_POST['id']]), 'class' => 'btn btn-default btn-rounded', 'id' => 'modalButton']) ?>
                </li>
            </ul>
            </div>
        </div>

    </div>
    


  </section><!-- End Portfolio Details Section -->
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

<?php
Modal::begin([
  'id' => 'modal',
  'size' => 'modal-sl',
  'clientOptions' => [
    'backdrop' => 'static',
    'keyboard' => false,
  ]
]);
echo "<div id='modalContent'></div>";
Modal::end();
?>