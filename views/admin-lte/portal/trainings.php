<?php

use yii\helpers\ArrayHelper;

$counter = 1;
$hasClosed = true;

use yii\helpers\Url;
use yii\widgets\LinkPager;
use yii\grid\GridView;
use yii\helpers\Html;
use app\models\backend\Trainings;
use app\models\backend\Seminars;
use app\models\training\Category;
use app\models\backend\Avp;
use app\models\backend\Techcategory;
use app\models\backend\Techtransfer;
use app\models\training\Uploadform;
use app\models\lab\Division;
use yii\widgets\Activeform;
use cics\widgets\VideoEmbed;
use yii\data\ArrayDataProvider;

$this->registerCssFile('@web/css/style.css');
$this->registerCssFile('@web/css/home/style.css');
$this->registerCssFile('@web/css/home/main.css');
$this->registerCssFile('@web/css/trainingandseminar.css');
$this->registerCssFile('@web/css/nav.css');
$this->registerCssFile('@web/css/details.css');
$this->registerCssFile('@web/css/homepage.css');

?>


<style>
body{
  background-color: #f6f9fc;
}
    .recent-posts .title {
      display: block;
      font-family: 'Lato', sans-serif;
      font-size: 10px;
      line-height: 1.3em;
      font-weight: 700;
      color: #36728e;
      text-decoration: none;
     
  }

  .btn-default {
      color: #333;
      background-color: transparent;
      border-color: transparent;
      overflow: hidden;
      margin: 0px 2px 2px 2px;
    
  }

  .btn-default:hover {
      color: #333;
      background-color: transparent;
      border-color: transparent;
  }

  .line-heading {
      overflow: hidden;
      margin: 0px 2px 2px 2px;
      color:#3c8dbc;
      font-weight: 300;
      line-height: 30px;
      border-top: 4px solid #3c8dbc;
      border-bottom: 1px solid #3c8dbc;
      text-shadow: 0px 1px 0 rgba(255, 255, 255, 0.5);
  }

  .img-fluid {
      max-width: 100%;
      height: auto;
  }

  .navbar-default {
    background-color: #3c8dbc;
    border-radius: 0px;

  }



  .nav > li > a {
      color: #4d4643;
      transition: all 0.3s;
      list-style: none;
      /* font-size: 12px; */
      font-family: "Dosis", sans-serif;

  }

  .nav> li > a:hover{
      background-color: #007879
  }


  .nav > li:hover > a {
      color: #fff;
      transition: all 0.3s;
      list-style: none;
      /* font-size: 12px; */
      font-family: "Dosis", sans-serif;
      background-color: #3c8dbc

  }

  .nav {
      margin-bottom: 0;
      list-style: none;
  }


  .portfolio .portfolio-item .portfolio-info h4 {
      font-size: 14px; 
      color: #fff;
      font-weight: 600;
      color: #2b2320;

  }


  .nav-tabs > li.active > a, .nav-tabs > li.active > a:hover, .nav-tabs > li.active > a:focus {
      color: #fff;
      cursor: default;
      background-color: #3c8dbc;

  }
  .nav-tabs > li { 
      margin-bottom: -1px;
  }


</style>

<!-- <a href="#" id="scroll" style="display: none;"><span></span></a>  -->

<section id="portfolio" class="portfolio" style="margin-top: 50px">
  <div class="container">
    <div class="row">
      <div class="col-sm-6 col-sm-offset-3 " style="margin-bottom: 50px; text-align: center;">
        <div class="nav justify-content-center nav-pills nav-fill">
          <ul class="nav nav-tabs flex-column" >
              <li class="col-sm-4 nav-item active show">
                <a class="nav-link active show" style="border-radius: 50px; font-size:12px" data-toggle="tab" href="#tab-1">
                  SEMINARS
                </a>
              </li>
              <li class="col-sm-4 nav-item mt-2">
                <a class="nav-link" style="border-radius: 50px;  font-size:12px" data-toggle="tab" href="#tab-2">
                  TRAININGS
                </a>
              </li>
              <li class="col-sm-4 nav-item mt-2">
              <a class="nav-link" id="avp_button" style="border-radius: 50px;  font-size:12px" data-toggle="tab" href="#tab-3">
                AVP
              </a>
            </li>
          </ul>
        </div>
      </div>

      <div class="col-sm-10 col-sm-offset-1 ml-auto" style="margin-bottom: 200px;">
        <div class="tab-content">
          <div class="tab-pane active" id="tab-1">
            <figure>
              <div class="row portfolio-container" data-aos="fade-up">
              <?php foreach ($tbl_seminars as $data) { ?>
              <div class="col-md-4 col-sm-6">
                <div class="portfolio-item">
                <div class="portfolio-image">
                <img src="<?= Yii::getAlias('@filenameUrl').'/' . $data->filename ?>" class="img-fluid" alt="">
                </div>
                <div class="portfolio-info-fade">
                <ul>
                  <li class="portfolio-project-name" style="font-size: 12px"><?= $data->title ?></li>
                  <b>Fee:</b> <?= $data->payment ?>
                  <br>
                  <i class="glyphicon glyphicon-calendar"></i>&nbsp;&nbsp; <?= $data->datesched ?>
                  <br>
                  <?php
                  $semlink = 'details'
                  ?>
                  <form action="<?= Url::toRoute('/portal/' . $semlink, $schema = true) ?>" method="post">
                  <input type="hidden" name="_csrf" value="<?= Yii::$app->request->getCsrfToken() ?>" />
                  <button class="btn btn-primary add-to-cart" name="id" value="<?= $data['id'] ?>" type="submit">
                  DETAILS
                  </button>
                  </form>
                </ul>
                </div>
                </div>
              </div>
              <?php } ?>
            </figure>
          </div>

          <div class="tab-pane" id="tab-2">
            <figure>
              <div class="ml-auto" data-aos="fade-left" data-aos-delay="100">
                <div class="tab-pane active" id="tab-2">
                  <figure>
                    <div class="row portfolio-container" data-aos="fade-up">
                      <?php foreach ($tbl_trainings as $training) { ?>
                        
                        <div class="col-md-4 col-sm-6">
                          <div class="portfolio-item">
                            <div class="portfolio-image">
                              <img src="<?= Yii::getAlias('@filenameUrl').'/'. $training->filename ?>" class="img-fluid" alt="">
                            </div>
                            <div class="portfolio-info-fade">
                            <ul>
                              <li class="portfolio-project-name" style="font-size: 12px"><?= $training->title ?></li>
                              <b>Fee:</b> <?=($training["payment"] == '0' || $training["payment"] == '' ? 'FREE' : number_format($training["payment"])) ?>
                              <br>
                              <i class="glyphicon glyphicon-calendar"></i>&nbsp;&nbsp;<?= $training->datesched ?>
                              <br>
                              <?php
                                $vinzlink = 'training-details'
                              ?>
                              <form action="<?= Url::toRoute('/portal/' . $vinzlink, $schema = true) ?>" method="post">
                              <input type="hidden" name="_csrf" value="<?= Yii::$app->request->getCsrfToken() ?>" />
                              <button class="btn btn-primary add-to-cart" name="id" value="<?= $training['id'] ?>" type="submit">
                               DETAILS
                              </button>
                              </form>
                            </ul>
                            </div>
                          </div>
                        </div>
                      <?php } ?>
                  </figure>
                </div>
              </div>
            </figure>
          </div>

            <div class="tab-pane" id="tab-3">
              <figure>
                <div class="row portfolio-container" data-aos="fade-up">
                      <div class="col-md-3">
                        <div class="line-heading" style="text-align: center"> AVP CATEGORIES </div>
                        <!-- <ul class="recent-posts"> -->
                          <div class="btn-group-vertical btn-block recent-posts" >               
                            <?php foreach ($tbl_category as $category) : ?>
                              <button class="btn-default title avp_category_button hvr-grow" value="<?= $category->id ?>"><?= $category->category; ?></button>
                            <?php endforeach; ?>
                          </div>
                        <!-- </ul> -->
                      </div>
                      <div class="two-third-col"></div>
                      <div class="col-md-9" id="avpCategory"></div>
                </div>
              </figure>
            </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php require('customer/footer.php'); ?>
</body>
</html>



<script>

$(document).on({
    ajaxStart: function(){
        $('#avpCategory').empty().html();
        $('#avpCategory').append('<div class="row"><div class="col-xs-4 col-xs-offset-4"><div class="loader"></div></div></div>');
    },
   
});

  $('#avp_button').on('click', function() {
    changeAvpCategory($('.avp_category_button:first').val());
  });

  $('.avp_category_button').on('click', function() {
    changeAvpCategory($(this).val());
  });

  function changeAvpCategory(id) {
    $.ajax({
      type: 'get',
      url: "<?= Yii::$app->request->baseUrl . '/portal/avp'; ?>",
      data: {
        id: id
      },
      success: function(data) {
        $('#avpCategory').empty().html(data);
      }
    });
  }

  $('.avp_nav').on('click', function() {
    console.log($('.avp_category_button :first').val());
    changeAvpCategory($('.avp_category_button :first').val());
  });

   var fixed = false;
    $(document).scroll(function() {
        if ($(this).scrollTop() > 250) {
            if (!fixed) {
                fixed = true;
                // $('#to-top').css({position:'fixed', display:'block'});
                $('#to-top').show("slow", function() {
                    $('#to-top').css({
                        position: 'fixed',
                        display: 'block'
                    });
                });
            }
        } else {
            if (fixed) {
                fixed = false;
                $('#to-top').hide("slow", function() {
                    $('#to-top').css({
                        display: 'none'
                    });
                });
            }
        }
    });
</script>

