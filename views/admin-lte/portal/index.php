<?php

use yii\helpers\Html;

use yii\bootstrap\Carousel;
use yii\widgets\Activeform;
use yii\widgets\ImageSlider;
use yii\base\InvalidConfigException;
use yii\helpers\ArrayHelper;
use app\models\backend\Trainings;
use app\models\backend\Seminars;
use app\models\backend\Techcategory;
use app\models\backend\Category;
use app\models\backend\Section;
use yii\helpers\Url;
use yii\widgets\Pjax;

$this->registerCssFile('@web/css/details.css');
$this->registerCssFile('@web/css/style.css');
$this->registerCssFile('@web/css/remixicon/remixicon.css');
$this->registerCssFile('@web/css/homepage.css');
$this->registerCssFile('@web/css/home/main.css');
$this->registerCssFile('@web/css/home/portal.css');
$this->registerCssFile('@web/css/home/portal.min.css');
$this->registerCssFile('@web/css/home/button.css');
$this->registerCssFile('@web/css/hexagon/hexagons.min.css');
$this->registerCssFile('@web/css/hexagon/page-style.css');
$this->registerJsFile('@web/js/tech/main.js');




?>
<style>
  .no-padding {
    padding: 0;
  }
</style>
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css" />
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
<script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<html>
<meta name='color-scheme' content='dark' />
<body>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="ri-arrow-up-s-line"></i></a>

  <?php require('customer/header.php'); ?>

  <?php require('customer/menu.php'); ?>

  <?php require('customer/bds.php'); ?>

  <?php require('customer/training.php'); ?>

  <?php require('customer/testing&analysis.php'); ?>

  <?php require('customer/metrology.php'); ?>

  <?php require('customer/pt.php'); ?>

  <?php require('customer/technicalservices.php'); ?>

  <?php require('customer/footer.php'); ?>


</body>

</html>



<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
  AOS.init();
</script>