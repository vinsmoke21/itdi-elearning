<?php

use yii\helpers\Html;
use yii\bootstrap\Modal;
use yii\widgets\DetailView;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use app\models\backend\Seminars;
use app\models\backend\Category;

$formatter = \Yii::$app->formatter;

$this->title = 'PT Services Details';
// $this->params['breadcrumbs'][] = ['label' => 'list', 'url' => ['list']];
// $this->params['breadcrumbs'][] = $this->title;
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
    text-shadow: none;
    color: white;
  }

  .btn:hover .closed {
    color: #333333;
  }
</style>

<!-- ======= Portfolio Details Section ======= -->
<div style="margin-top: 50px; margin-bottom: 100px">
  <section class="portfolio-details container">
    <div class="row gy-4">
      <div class="col-lg-8">
        <div class="thumbnail">
          <img src="<?= Yii::getAlias('@filenameUrl') . '/' . $services->details ?>" style="width: 100%; height:80vh; object-fit:cover" />
        </div>
      </div>
      <div class="col-lg-4">
        <div class="portfolio-info">
          <h3><?= $services["pt_code"]; ?></h3>
          <ul>
            <li><strong>Category</strong>:<?= $category->target_analytes ?></li>
            <li><strong>Target Analytes</strong>:<?= $services->target_analytes ?></li>
            <li><strong>Fee</strong>:<?= $services->price ?></li>
            <li><strong>Unit Qunatity</strong>:<?= $services->unit_quantity ?></li>
            <li><strong>Date Start</strong>: <?= $formatter->asDateTime($services["start_date"]) ?> </li>
            <li><strong>Date End</strong>: <?= $formatter->asDateTime($services["end_date"]) ?> </li>
            <li>
              <?= Html::button('Join', ['value' => Url::to(['/pt-services/pt-join', 'id' => $_POST['id']]), 'class' => 'btn btn-default btn-rounded', 'id' => 'modalButton']) ?>
            </li>
          </ul>
        </div>
      </div>
  </section><!-- End Portfolio Details Section -->
</div>
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