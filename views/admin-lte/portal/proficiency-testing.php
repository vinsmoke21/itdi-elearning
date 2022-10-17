<?php

use yii\helpers\Html;
use yii\widgets\Activeform;
use yii\helpers\Url;
use yii\widgets\Pjax;
use yii\data\Pagination;
use yii\widgets\LinkPager;


$this->registerCssFile('@web/css/style.css');
$this->registerCssFile('@web/css/homepage.css');
$this->registerCssFile('@web/css/home/main.css');
$this->registerCssFile('@web/css/home/portal.css');
$this->registerCssFile('@web/css/home/portal.min.css');
$this->registerCssFile('@web/css/details.css');
$this->title = 'ITDI Portal';
$formatter = Yii::$app->formatter;

?>
<style>
  .blog .sidebar {
    padding: 30px;
    margin: 0 0 60px 20px;
    box-shadow: 0 4px 16px rgb(0 0 0 / 10%);
  }

  .blog .sidebar .recent-posts h4 a:hover {
  color: #3498db;
}
</style>
<html>

<body>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="ri-arrow-up-s-line"></i></a>
  <section id="blog" class="blog">
    <div class="container">
      <div class="row" style="padding-top: 100px;">
        <div class="col-sm-4">
          <div class="sidebar">

            <!-- End sidebar search formn-->
            <p class="lead">Categories</p>
            <div class="btn-group-vertical btn-block" style="padding-bottom: 20px;">
            <?php foreach ($pt_category as $index => $category) :
              ?>
                <?= Html::button($category->target_analytes, $options = [
                  'value' => $category->id,
                  'class' => 'btn btn-default pt-category-button hvr-fade',
                  'style' => 'padding-right:80%; font-size: 12px'
                ]) ?>
              <?php endforeach; ?>
            </div>
            <h3 class="sidebar-title">Recent Posts</h3>
            <?php foreach ($pt_materials as $material) : ?>
              <div class="sidebar-item recent-posts">
                <div class="post-item clearfix">
                  <img src="<?= Yii::getAlias('@maUrl') . '/' . $material['image'] ?>" alt="" class="img-fluid" alt="">

                  <?php
                  $ptlink = 'proficiency-details'
                  ?>

                  <form action="<?= Url::toRoute('/portal/' . $ptlink, $schema = true) ?>" method="post" target="_blank">
                    <input type="hidden" name="_csrf" value="<?= Yii::$app->request->getCsrfToken() ?>" />
                    <button class="btn-default1" name="id" value="<?= $material['id'] ?>">
                      <strong><a style="text-decoration: none;"><?= $material['analyte_matrix'] ?></a></strong>
                    </button>
                  </form>
                </div>
              </div>
            <?php endforeach; ?>
          </div><!-- End sidebar -->
        </div>

        <div class="col-lg-8">
          <div class="row carousel-holder">
            <div class="col-md-12 hidden-xs" style="padding-bottom: 10px;">
              <div id="carousel-example-generic" class="carousel slide " data-ride="carousel">
                <div class="carousel-inner">
                  <div class="item active">
                    <!-- <img class="first-slide" src="<?= Yii::$app->request->baseUrl ?>/img/slide/pt.jpg" alt="First slide" style="width:100%; height: 40vh"> -->
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div id="categoryProficiency"></div>
        </div>
      </div>
    </div>
  </section>


  <!-- /.container -->

  <?php require('customer/footer.php'); ?>


</body>

</html>

<script>
  $('#pt_button').on('click', function() {
    changeTechCategory($('.pt_category_button:first').val());
  });

  $('.pt_category_button').on('click', function() {
    changeTechCategory($(this).val());
  });

  function changePtCategory(id) {
    $.ajax({
      type: 'get',
      url: "<?= Yii::$app->request->baseUrl . '/portal/proficiency'; ?>",
      data: {
        id: id
      },
      success: function(data) {
        $('#ptCategory').empty().html(data);
      }
    });
  }

  $('.pt_nav').on('click', function() {
    console.log($('.pt_category_button :first').val());
    changeAvpCategory($('.pt_category_button :first').val());
  });

  openCategoryTab($('.pt-category-button:first').val(), "<?= Yii::$app->request->baseUrl . '/portal/proficiency'; ?>", '#categoryProficiency');

  $('.pt-category-button').click(function() {
    openCategoryTab($(this).val(), "<?= Yii::$app->request->baseUrl . '/portal/proficiency'; ?>", '#categoryProficiency');
  });

  function openCategoryTab(id, link, divId) {
    console.log(id);
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