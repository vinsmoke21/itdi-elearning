<?php
$counter = 1;
$hasClosed = true;

use yii\helpers\Html;
use yii\helpers\Url;
// echo 'HELLO';
// var_dump($model);
$formatter = \Yii::$app->formatter;
date_default_timezone_set('Asia/Manila');
?>

<div class="line-heading"><b><?= $category->category ?></b></div>

<?php foreach ($model as $semandtrain) : ?>

  <div class="col-sm-4 text-center" data-aos="fade-up">
    <div class="portfolio-info">
      <div class="thumbnail">
        <div class="product-image-wrapper">
          <div class="single-products">

            <a>
              <img src="<?= Yii::getAlias('@filenameUrl') . '/' . $semandtrain['filename'] ?>" alt="" style="cursor: pointer;">
            </a>

            <div class="product-overlay">

              <div class="overlay-content" style="padding-bottom:50px">
                <!--title and button-->
                <p><?= $semandtrain['title'] ?></p>

                <?php
                $semlink = 'training-details';
                if ($semandtrain['train_or_sem'] == 'seminar') {
                  $semlink = 'details';
                }
                ?>
                <form action="<?= Url::toRoute('/portal/' . $semlink, $schema = true) ?>" method="post">
                  <input type="hidden" name="_csrf" value="<?= Yii::$app->request->getCsrfToken() ?>" />
                  <button class="btn btn-primary add-to-cart" name="id" value="<?= $semandtrain['id'] ?>" type="submit">
                    DETAILS
                  </button>
                </form>
              </div>
            </div>

            <div class="choose" style="margin-top: -20px; padding-left:10px">
              <br>
              <ul class="nav nav-pills" style="margin-top: 10px;">
                <span class="pull-left"><b>Fee: </b><?= ($semandtrain["payment"] == '0' || $semandtrain["payment"] == '' ? 'FREE' : number_format($semandtrain["payment"])); ?>&nbsp;&nbsp;</span>
                <br>
                <span class="pull-left"><b>Mode:</b>&nbsp;<?php if ($semandtrain["mode"] == 1) {
                                                            echo $semandtrain["mode"] == 1 ? 'Blended Learning' : $semandtrain["mode"];
                                                          } elseif ($semandtrain["mode"] == 2) {
                                                            echo $semandtrain["mode"] == 2 ? 'Face to Face' : $semandtrain["mode"];
                                                          } elseif ($semandtrain["mode"] == 3) {
                                                            echo $semandtrain["mode"] == 3 ? 'Online Training' : $semandtrain["mode"];
                                                          } else {
                                                            echo $semandtrain["mode"] == 4 ? 'Webinar' : $semandtrain["mode"];
                                                          }
                                                          ?></span>
                <br>
                <span class="pull-left"><i class="glyphicon glyphicon-calendar"></i>&nbsp;&nbsp;<?= $formatter->asDateTime(strtotime($semandtrain["datesched"]), 'php: d.M.Y h:i:a') ?></a></span>
                                                  

                <br><br>
                <!-- <div class="card-read-more">
                  <div class="details">
                    <span>Speaker</span>
                  </div>
                </div>
                <div class="user">
                  <img src="http://localhost/itdi-tsd/web/uploads/avatar/vinz.jpg" />
                  <div class="user-info" style="margin-top: 5px;">
                    <h5><span class="pull-left">Dr. Annabelle V. Briones</span></h5>
                    <small><span class="pull-left">Senior Science Research Specialist II </span></small>
                  </div>
                </div> -->

              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php endforeach; ?>

<style>
  .card-read-more {
    border-top: 1px solid #D4D4D4;
  }

  .card-read-more .details span {
    font-size: 10px;
    color: #718096;
    display: block;
    margin-top: 16px;
    margin-right: 200px;

  }

  .details {
    margin-top: -10px;
  }
</style>