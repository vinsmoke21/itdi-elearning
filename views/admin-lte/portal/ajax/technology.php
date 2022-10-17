<?php
use yii\helpers\Html;
use yii\helpers\Url;

?>


<div class="line-heading"  ><b><center><?= $tech_category->category?></center></b></div>
<div id="portfolio" class="portfolio">
<?php foreach ($technologies as $tech) : ?>
  <div class="col-sm-4" data-aos="fade-up">
    <div class="portfolio-info">
      <div class="thumbnail">
        <div class="product-image-wrapper">
          <div class="single-products">
            <a class="">
              <img src="<?= Yii::getAlias ('@techUrl').'/'. $tech['image'] ?>"  alt="" style="cursor: pointer; width:100%; height:27vh; object-fit:cover">
            </a>

            <div class="product-overlay2">
              <div class="overlay-content center" style="padding-bottom:50px">
                <p><?= $tech['title'] ?></p>

                  <?php
                  $techlink = 'technology-details'
                  ?>
                
                  <form action="<?= Url::toRoute('/portal/'.$techlink, $schema = true) ?>" method="post">
                    <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
                    <button class="btn btn-primary add-to-cart" name="id" value="<?= $tech['id'] ?>" type="submit">
                      DETAILS
                    </button>
                  </form>
              </div>
            </div> 
                        
            <div class="choose" style="padding-top: 10px; padding-left:10px">
            <br>
            <ul class="nav nav-pills">
            <span class="pull-left">Description:<?= strlen($tech['description']) > 50 ? mb_substr($tech['description'],0,50)."..." : $tech['description']; ?>&nbsp;&nbsp;</span>
            <br>
            <br>  
            <br>
          </ul>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php endforeach; ?>
</div>

<script type="text/javascript">
$(function () {
    $('.main_content, .main_navi').hide();
    $(window).load(function () {
        $('#loader').fadeOut();
        $('.main_content, .main_navi').fadeIn(2000);
    });
});

</script>


<?php

