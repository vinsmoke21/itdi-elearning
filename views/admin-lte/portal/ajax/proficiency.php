<?php
use yii\helpers\Html;
use yii\helpers\Url;

?>


<div class="line-heading"  ><b><center><?= $pt_category->category?></center></b></div>
<div id="portfolio" class="portfolio">
  <?php foreach ($pt_materials as $material) : ?>

    <div class="col-sm-4 text-center" data-aos="fade-up">
    <div class="portfolio-info">
      <div class="thumbnail">
        <div class="product-image-wrapper">
          <div class="single-products">
            <img src="<?= Yii::getAlias ('@maUrl').'/'. $material['image'] ?>" alt="" class="img-fluid" alt="" style="cursor: pointer;">
            <div class="product-overlay">
            <div class="overlay-content" style="padding-bottom:50px">
            <p><?= $material['analyte_matrix'] ?></p>
                <?php
                  $prolink = 'proficiency-details'
                ?>
                <form action="<?= Url::toRoute('/portal/'.$prolink, $schema = true) ?>" method="post">
                  <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
                  <button class="btn btn-primary add-to-cart" name="id" value="<?= $material['id'] ?>" type="submit">
                  DETAILS
                </button>
                </form>
            </div>
            </div>
            <div class="choose" style="padding-top: 10px; padding-left:10px"><br>
                <ul class="nav nav-pills">
                  <span class="pull-left"><b>Fee: </b><?= $material['fee'] ?>&nbsp;&nbsp;</span>
                  <br>
                  <br>
                </ul>
            </div>
          </div>
        </div>
      </div>
  <?php endforeach; ?>
</div>

