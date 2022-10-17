<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
AppAsset::register($this);
$this->registerCssFile('@web/css/main.css' );
$this->registerCssFile('@web/css/nav.css' );

$sysBaseUrl = Yii::$app->request->baseUrl;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
     <link rel="shortcut icon" href="<?php echo Yii::$app->request->baseUrl; ?>/favicon.png" type="image/x-icon" />

</head>
<body>


<?php $this->beginBody() ?>

<div class="wrap">
    <?php
      NavBar::begin([
          'brandLabel' => '<img style="width: auto; height: 40px;margin-top: -1px" src="../logo.png" class="img-responsive hidden-xs"/>',
          'brandUrl' => Yii::$app->homeUrl,
          'options' => [
              'class' => 'navbar-main navbar-fixed-top',
          ],
        
      ]);
      if (Yii::$app->user->can('access admin module')) {
        $url = '/admin/default/index';
      }
      elseif (Yii::$app->user->can('access backend module')) {
        $url = '/backend/index';
      }
      else {
        $url = '/portal/index';
      }
      echo Nav::widget([
          'options' => ['class' => 'navbar-nav navbar-right '],
          'id' =>['mainNav'],
          'items' => [
              ['label' => 'Home', 'url' => ['portal/index']],
              ['label' => 'ITDI Services',
              'items' => [
                ['label' => 'Technical Services', 'url' => 'https://request.itdi.com.ph', 'linkOptions' => ['target' => '_blank']],
                  '<li class="divider"></li>',
                  ['label' => 'Technology Transfer', 'url' => 'technologytransfer'],
                  '<li class="divider"></li>',
                  ['label' => 'Trainings and Webinars', 'url' => ['/portal/trainings']],
                  '<li class="divider"></li>',
                  ['label' => 'Proficiency Testing', 'url' => ['/portal/proficiency-testing']],
              ],
              ],
              // ['label' => 'Technical Services', 'url' => 'https://request.itdi.com.ph', 'linkOptions' => ['target' => '_blank']],
              // ['label' => 'Technology Transfer', 'url' => 'technologytransfer'],
              // ['label' => 'Trainings and Seminars', 'url' => ['/portal/trainingandseminar']],
              ['label' => 'Inquiry', 'url' => ['/portal/inquiry']],
              ['label' => 'About Us',
                  'items' => [
                      ['label' => 'About ITDI', 'url' => 'https://itdi.dost.gov.ph', 'linkOptions' => ['target' => '_blank']],
                      '<li class="divider"></li>',
                      ['label' => 'Contact Us', 'url' => 'contact'],
                      
                      
                ],
                
              ],
          ],
      ]);
      
      NavBar::end();
    ?>
    

      <div class="">
          <?= Alert::widget() 
          ?>
          <?= $content ?>
      </div>
      
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>


<style>

  .navbar-default {
    border-radius: 1px;
    border-left: 1px solid #3e3e3e;
  }

  .navbar-default .navbar-nav > .active > a, 
  .navbar-default .navbar-nav > .active > a:hover, 
  .navbar-default .navbar-nav > .active > a:focus {
      color: #3498db;
      /* background-color: #fff; */
  }
  /* .navbar-main{
      margin-bottom: 100px;
  } */

  .dropdown-menu > li > a {
    display: block;
    padding: 3px 4px;
    clear: both;
    font-weight: 100;
    line-height: 1.42857143;
    color: #fff;
    white-space: nowrap;
    font-size: 10px;
   
}

.dropdown-menu{
  min-width: 200px;
}

.navbar .dropdown ul {
    display: block;
    position: absolute;
    left: 1px;
    top: calc(100% + 30px);
    margin: 0;
    padding: 1px 0;
    z-index: 99;
    opacity: 0;
    visibility: hidden;
    background: #3c8dbc;
    /* box-shadow: 0px 0px 30px rgb(127 137 161 / 25%); */
    transition: 0.3s;
    border-radius: 4px;
}

</style>

