<?php

use yii\helpers\Html;
use yii\bootstrap\Modal;
use yii\widgets\DetailView;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use app\models\backend\Seminars;
use app\models\backend\Category;

$formatter = \Yii::$app->formatter;

$this->title = 'ITDI Portal';
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
          <img src="<?= Yii::getAlias('@filenameUrl') . '/' . $tbl_seminars->filename ?>" style="width: 100%; height:80vh; object-fit:cover" />
        </div>
      </div>
      <div class="col-lg-4">
        <div class="portfolio-info">
          <h3><?= $tbl_seminars["title"]; ?></h3>
          <ul>
            <li><strong>Category</strong>:<?= $tbl_category->category ?>
            </li>
            <li><strong>Date Start</strong>: <?= $formatter->asDateTime(strtotime($tbl_seminars->datesched), 'php: d.M.Y h:i:a') ?> </li>
            <li><strong>Mode</strong>: <?= $tbl_seminars["mode"]; ?></li>
            <li><strong>Fee</strong>: <?= ($tbl_seminars["payment"] == '0' || $tbl_seminars["payment"] == '' ? 'FREE' : number_format($tbl_seminars["payment"])); ?></li>
            <li>
              <?php
              $btnText = 'Register';
              $btnclass = 'FREE';
              $btnclass = '';
              $btnText2 = 'Inquire';
              $btnclass2 = '';
              $btnText3 = 'Closed';
              $link = 'free';

              if ($tbl_seminars->control == 0 && $tbl_seminars->payment == 0 || $tbl_seminars->payment == '') {
                echo Html::button(
                  $btnText,
                  [
                    'value' => Url::to(['/portal/free', 'id' => $_POST['id']]),
                    'class' => 'btn btn-default btn-rounded ' . $btnclass,  'id' => 'modalButton', $btnclass => $btnclass
                  ]
                );
              } elseif ($tbl_seminars->control == 1) {
                $btnclass = 'disabled';
                $btnText = 'Closed';
                $btnText2 = 'Inquire';
                $btnclass2 = '';
                echo Html::button(
                  $btnText,
                  [
                    'value' => Url::to(['/portal/seminar-inquiry', 'id' => $_POST['id']]),
                    'class' => 'btn btn-default btn-rounded ' . $btnclass, 'id' => 'modalButton', $btnclass => $btnclass
                  ]
                );

                echo Html::a(
                  $btnText2,
                  '../portal/inquire',
                  [
                    'style' => 'margin-left:5px',
                    'class' => 'btn btn-default btn-rounded' . $btnclass2
                  ]
                );
              } else {
                echo Html::button(
                  $btnText,
                  [
                    'value' => Url::to(['/portal/seminar-inquiry', 'id' => $_POST['id']]),
                    'class' => 'btn btn-default btn-rounded ' . $btnclass, 'id' => 'modalButton', $btnclass => $btnclass
                  ]
                );
              }

              ?>
            </li>
          </ul>
        </div>
        <div class="portfolio-description">
          <h2>Description</h2>
          <p>
            <?= $tbl_seminars["description"]; ?>
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