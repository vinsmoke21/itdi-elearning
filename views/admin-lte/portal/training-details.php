<?php

use yii\helpers\Html;
use yii\bootstrap\Modal;
use yii\widgets\DetailView;
// use app\training\Trainings;
// use app\training\Uploadform;
// use app\training\Category;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

use yii\grid\GridView;
use app\models\backend\Trainings;
use app\models\backend\Seminars;
use app\models\backend\Category;
use app\models\backend\Tblinquiry;
use app\models\backend\Uploadform;
use app\models\lab\Division;

$formatter = \Yii::$app->formatter;
date_default_timezone_set('Asia/Manila');
$this->title = 'ITDI Portal';
$this->registerCssFile('@web/css/details.css');

use johnitvn\ajaxcrud\CrudAsset;

CrudAsset::register($this);
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
</style>

<!-- ======= Portfolio Details Section ======= -->
<div style="margin-top: 50px; margin-bottom: 100px">
  <section class="portfolio-details container">
    <div class="row gy-4">
      <div class="col-lg-8">
        <div class="thumbnail">
          <img src="<?= Yii::getAlias('@filenameUrl') . '/' . $tbl_trainings->filename ?>" style="width: 100%; height:80vh; object-fit:cover" />
        </div>
      </div>
      <div class="col-lg-4">
        <div class="portfolio-info" style="padding-bottom: 10px;">
          <h3 style="margin-top: -20px;"><?= $tbl_trainings["title"]; ?></h3>
          <ul style="margin-top: -10px;">
            <li><strong>Category</strong>:<?= $tbl_category->category ?>
            </li>
            <li><strong>Date Start</strong>: <?= $formatter->asDateTime(strtotime($tbl_trainings->datesched), 'php: d.M.Y h:i:a') ?> </li>
            <li><strong>Mode of Training</strong>:
              <?php if ($tbl_trainings["mode"] == 1) {
                echo $tbl_trainings["mode"] == 1 ? 'Blended Learning' : $tbl_trainings["mode"];
              } elseif ($tbl_trainings["mode"] == 2) {
                echo $tbl_trainings["mode"] == 2 ? 'Face to Face' : $tbl_trainings["mode"];
              } elseif ($tbl_trainings["mode"] == 3) {
                echo $tbl_trainings["mode"] == 3 ? 'Online Training' : $tbl_trainings["mode"];
              } else {
                echo $tbl_trainings["mode"] == 4 ? 'Webinar' : $tbl_trainings["mode"];
              }
              ?></li>
            <li><strong>Fee</strong>: <?= ($tbl_trainings["payment"] == '0' || $tbl_trainings["payment"] == '' ? 'FREE' : number_format($tbl_trainings["payment"])); ?></li>
            <li>
              <?php
              $btnText = 'Register';
              $btnclass = 'FREE';
              $btnclass = '';
              $btnText2 = 'Inquire';
              $btnclass2 = '';
              $btnText3 = 'Closed';
              $link = 'free';

              if ($tbl_trainings->control == 0 && $tbl_trainings->payment == 0 || $tbl_trainings->payment == '') {
                echo Html::button(
                  $btnText,
                  [
                    'value' => Url::to(['/portal/free', 'id' => $_POST['id']]),
                    'class' => 'btn btn-default btn-rounded ' . $btnclass,  'id' => 'modalButton', $btnclass => $btnclass
                  ]
                );
              } elseif ($tbl_trainings->control == 1) {
                $btnclass = 'disabled';
                $btnText = 'Closed';
                $btnText2 = 'Inquire';
                $btnclass2 = '';

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
                    'value' => Url::to(['/portal/training-inquiry', 'id' => $_POST['id']]),
                    'class' => 'btn btn-default btn-rounded ' . $btnclass, 'id' => 'modalButton', $btnclass => $btnclass
                  ]
                );
              }

              ?>
              <?php
              $btnText = 'PDF File';
              $btnclass = '';
              if ($tbl_trainings->pdf != '') {
                echo Html::a(
                  $btnText,
                  '@pdfUrl' . '/' . $tbl_trainings['pdf'],
                  ['target' => '_blank', 'class' => 'btn btn-default btn-rounded' . $btnclass]
                );
              }
              ?>
            </li>
          </ul>
        </div>
        <div class="portfolio-info" style="padding-bottom: 10px;">
          <h3 style="margin-top: -20px;">Speaker(s)</h3>
          <?php if ($externals != null) : ?>
            <?php foreach ($externals as $external) :
            ?>
              <ul>
                <li>
                  <div class="user">
                    <img src="<?= Yii::getAlias('@speakerUrl') . '/' . $external->speak->profile ?>" />
                    <div class="user-info" style="margin-top: 5px;">
                      <h5><span class="pull-left"><?= $external->speak->speaker ?></span></h5>
                      <small><span class="pull-left"><?= $external->external->designation ?></span></small>
                    </div>
                  </div>
                </li>
              </ul>
            <?php endforeach; ?>
          <?php endif; ?>

          <?php if ($internals != null) : ?>
            <?php foreach ($internals as $internal) :
            ?>
              <ul>
                <li>
                  <div class="user">
                    <img class="profile-user-img img-responsive img-circle" src=<?= Yii::getAlias('@avatarUrl') ?>>
                    <div class="user-info" style="margin-top: 5px;">
                      <h5><span class="pull-left"><?= $internal->plantilla->name ?></span></h5>
                      <small><span class="pull-left"><?= $internal->designation->position ?></span></small>
                    </div>
                  </div>
                </li>
              </ul>
            <?php endforeach; ?>
          <?php endif; ?>
        </div>
        <div class="portfolio-description">
          <h2 style="margin-top: -20px;">Description</h2>
          <p>
            <?= $tbl_trainings["description"]; ?>
          </p>
        </div>
        <?php if ($checklisted != null) : ?>
          <div class="portfolio-description">
            <h2 style="margin-top: -20px;">Training Background List</h2>
            <?php foreach ($checklisted as $checklist) :
            ?>
               <p><strong>•</strong><?= $checklist->background->requirements ?></p>
     
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
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