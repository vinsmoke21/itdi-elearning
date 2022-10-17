<?php

use yii\helpers\Html;
use yii\widgets\Activeform;
use yii\helpers\Url;
use yii\widgets\Pjax;
use yii\data\Pagination;
use yii\widgets\LinkPager;
use app\models\backend\TechnologiesSearch;

$this->registerCssFile('@web/css/style.css');
$this->registerCssFile('@web/css/homepage.css');
$this->registerCssFile('@web/css/home/main.css');
$this->registerCssFile('@web/css/home/portal.css');
$this->registerCssFile('@web/css/home/portal.min.css');
$this->registerCssFile('@web/css/details.css');
$this->title = 'ITDI Portal';
$formatter = Yii::$app->formatter;
$searchedTitle = Yii::$app->request->get('SearchTechnology');
$searchTerm = null;
if (isset($searchedTitle['title'])) {
  $searchTerm = $searchedTitle['title'];
}
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

  <section id="blog" class="blog">
    <div class="container">
      <div class="row" style="padding-top: 100px;">
        <div class="col-lg-4">
          <div class="sidebar">
            <!-- sidebar search formn-->

            <!-- <h3 class="sidebar-title">Search</h3>

            <div class="sidebar-item search-form">
              <?php $form = ActiveForm::begin(['action' => ['technologytransfer'], 'method' => 'get', 'class' => 'lockscreen']); ?>
                <?= $form->field($searchModel, 'title')->textInput(array('placeholder' => 'Search Title'))->label(false); ?>
                <?= Html::submitButton('', ['class' => 'glyphicon glyphicon-search']) ?>
                <?php ActiveForm::end(); ?>
            </div> -->

            <!-- End sidebar search formn-->
            <p class="lead">Categories</p>
            <div class="btn-group-vertical btn-block" style="padding-bottom: 20px;">
              <?php foreach ($tech_category as $index => $category) : ?>
                <?= Html::button($category->category, $options = ['value' => $category->id, 'class' => 'btn btn-default technology-category-button hvr-fade', 'style' => 'padding-right:80%']) ?>
              <?php endforeach; ?>
            </div>
            <h3 class="sidebar-title">Recent Posts</h3>
            <?php foreach ($technologies as $tech) : ?>
              <div class="sidebar-item recent-posts">
                <div class="post-item clearfix">
                  <img src="<?= Yii::getAlias('@techUrl') . '/' . $tech['image'] ?>" alt="" class="img-fluid" alt="">

                  <?php
                  $techlink = 'technology-details'
                  ?>

                  <form action="<?= Url::toRoute('/portal/' . $techlink, $schema = true) ?>" method="post" target="_blank">
                    <input type="hidden" name="_csrf" value="<?= Yii::$app->request->getCsrfToken() ?>" />
                    <button class="btn-default1" name="id" value="<?= $tech['id'] ?>">
                      <strong><a style="text-decoration: none;"><?= $tech['title'] ?></a></strong>
                    </button>
                  </form>
                  <time><?= $formatter->asDate($tech["upload_date"]) ?></time>
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
                    <img class="first-slide" src="<?= Yii::$app->request->baseUrl ?>/img/slide/bds.jpg" alt="First slide" style="width:100%; ">
                  </div>
              </div>
            </div>
          </div>
          <div id="categoryTransfer"></div>
        </div>
      </div>
    </div>
  </section>


  <!-- /.container -->

  <?php require('customer/footer.php'); ?>


</body>

</html>

<script>
  openCategoryTab({
    id: $('.technology-category-button:first').val(),
    <?php if ($searchTerm != null) : ?> 
    title: '<?= $searchTerm ?>'
    <?php endif; ?>
  }, "<?= Yii::$app->request->baseUrl . '/portal/transfer'; ?>", '#categoryTransfer');

  $('.technology-category-button').click(function() {
    openCategoryTab({
      id: $(this).val()
    }, "<?= Yii::$app->request->baseUrl . '/portal/transfer'; ?>", '#categoryTransfer');
  });

  function openCategoryTab(data, link, divId) {
    $(divId).append('<div class="row"><div class="col-xs-4 col-xs-offset-4"><div class="loader"></div></div></div>');
    $.ajax({
      type: 'get',
      url: link,
      data: data,
      success: function(data) {
        $(divId).empty().append(data);
      }
    });
  }


  $('#tech_button').on('click', function() {
    changeTechCategory($('.tech_category_button:first').val());
  });

  $('.tech_category_button').on('click', function() {
    changeTechCategory($(this).val());
  });

  function changeTechCategory(id) { //recent post
    $.ajax({
      type: 'get',
      url: "<?= Yii::$app->request->baseUrl . '/portal/technologies'; ?>",
      data: {
        id: id
      },
      success: function(data) {
        $('#techCategory').empty().append(data);
      }
    });
  }

  $('.tech_nav').on('click', function() {
    console.log($('.tech_category_button :first').val());
    changeAvpCategory($('.tech_category_button :first').val());
  });

  $(document).on('click', '.lnk', function(e) {
    e.preventDefault();
    $.ajax({
      type: 'get',
      url: $(this).attr('href'),
      success: function(data) {
        $('#categoryTransfer').empty().append(data);
      }
    });
  })
</script>