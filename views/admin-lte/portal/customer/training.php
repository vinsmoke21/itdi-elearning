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
use yii\helpers\Url;
use yii\widgets\Pjax;
?>

<!-- ======= Trainings and Seminars Section ======= -->
<section id="trainingandseminar" style="padding-top: 60px;">
  <div class="container">
    <div class="row">
      <header class="section-header">
        <p>Trainings and Seminars</p>
      </header>
      <div class="col-sm-12" style=" text-align: center;">

        <div class="col-sm-3">
          <div class="line-heading" data-aos="fade-up" style="text-align: center"> <b>CATEGORIES</b></div>
          <div class="btn-group-vertical btn-block" style="font-size: 10px;">
            <?php foreach ($tbl_category as $category) : ?>
              <button class="btn btn-default category_button hvr-fade" style="padding-right:80%" value="<?= $category->id ?>"><?= $category->category; ?></button>
            <?php endforeach; ?>
          </div>

          <div class="viewall" style="background:#f6f9fc;padding-top: 10px;padding-bottom:10px">
            <a href="http://localhost/cportal/itdi-elearning/web/portal/trainingandseminar" class="btn1 effect01"><span>View All &nbsp;<i class="glyphicon glyphicon-menu-right"></i></span></a>
          </div>
        </div>

        <div class="col-sm-9" id="categoryAjax">
          <?php $comparator = 0 ?>
          <?php $hasClosed = true ?>
          <?php foreach ($seminars as $seminar) : ?>
            <?php if ($seminar->category_id != $comparator) : ?>
              <?php $comparator = $seminar->category_id; ?>
              <?php if (!$hasClosed) : ?>
        </div>

        <?php $hasClosed = true ?>
      <?php endif; ?>
      <div class="seminar-block" id="seminar_<?= $seminar->category_id ?>">
        <?php $hasClosed = false ?>
      <?php endif; ?>
    <?php endforeach; ?>
      </div>
      <?php foreach ($tbl_category as $cat) { ?>
        <?php
        $seminars = Seminars::find()->where(['category_id' => $cat->id])->all();
        ?>

        <div class="tab-content">
          <div class="tab-pane " id=<?php echo '"' . $cat->category . '"' ?>>
            <?php
            foreach ($seminars as $display) {

              echo $display->title;
            }
            ?>
          </div>
        </div>

      <?php } ?>
      </div>
    </div>
  </div>
</section>
<!-- ======= End of Trainings and Seminars Section ======= -->


<script type="text/javascript">
  $(function() {
    $('.main_content, .main_navi').hide();
    $(window).load(function() {
      $('#loader').fadeOut();
      $('.main_content, .main_navi').fadeIn(2000);
    });
  });
  $(document).ready(function() {
    $("body").css("display", "none");
    $("body").fadeIn(2000);
    $("a.transition").click(function(event) {
      event.preventDefault();
      linkLocation = this.href;
      $("body").fadeOut(1000, redirectPage);
    });

    function redirectPage() {
      window.location = linkLocation;
    }
  });
</script>
<script>
  openCategoryTab($('.category_button:first').val(), "<?= Yii::$app->request->baseUrl . '/portal/seminars'; ?>", '#categoryAjax');


  $('.category_button').click(function() {
    openCategoryTab($(this).val(), "<?= Yii::$app->request->baseUrl . '/portal/seminars'; ?>", '#categoryAjax');
  });




  function openCategoryTab(id, link, divId) {
    $(divId).append('<div class="row"><div class="col-xs-4 col-xs-offset-4"><div class="loader"></div></div></div>');
    $.ajax({
      type: 'get',
      url: link,
      data: {
        id: id
      },
      success: function(data) {
        $(divId).empty().html(data);
      }
    });
  }
</script>
<style>
  .category_button {
    font-size: 10px;
  }
</style>