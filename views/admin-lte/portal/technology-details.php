<?php

use yii\helpers\Html;
use yii\bootstrap\Modal;
use yii\widgets\DetailView;;

use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use app\models\backend\Trainings;
use app\models\backend\Seminars;
use app\models\backend\Category;

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
</style>

<!-- ======= Portfolio Details Section ======= -->

<div style="margin-top: 50px; margin-bottom: 100px">
  <section class="portfolio-details container">
    <div class="row gy-4">

      <div class="col-lg-8">
        <div class="thumbnail">
          <img src="<?= Yii::getAlias('@techUrl') . '/' . $technologies['image'] ?>" style="width: 100%; height:80vh; object-fit:cover">
        </div>
      </div>

      <div class="col-lg-4">
        <div class="portfolio-info">
          <h3>
            <div class="a">
              <h4><?= $technologies["title"]; ?></h4>
            </div>
          </h3>
          <ul>
            <li><strong>Category</strong>:<?= $tech_category->category ?></li><br>
            <li><strong>Licensing Fee</strong>:<?= $technologies["licensing_fee"] ?></li><br>
            <li>
              <?= Html::button('Inquire', ['value' => Url::to(['/portal/techinquiry', 'id' => $_POST['id']]), 'class' => 'btn btn-default btn-rounded', 'id' => 'modalButton']) ?>


              <?php
              $btnText = 'View PDF';
              $btnclass = '';
              if ($technologies->pdf_file != '') {
                echo Html::a(
                  $btnText,
                  '@pdfUrl' . '/' . $technologies['pdf_file'],
                  ['target' => '_blank', 'class' => 'btn btn-default btn-rounded' . $btnclass]
                );
              }
              ?>

            </li>
          </ul>
        </div>
        <div class="portfolio-description">
          <h2>Description</h2>
          <p>
            <?= $technologies["description"]; ?>
          </p>
        </div>
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