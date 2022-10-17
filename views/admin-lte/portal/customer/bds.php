<?php

use yii\helpers\Html;

?>


<!-- ======= Technology Transfer ======= -->
<section id="technologytransfer">
  <div class="container">
    <div class="row">
      <header class="section-header">
      <p style="margin-top: -40px;">Technology Transfer</p>
      </header>
        <div class="col-sm-12" data-aos="fade-up">
          <div class="col-sm-3">
            <div class="line-heading" data-aos="fade-up" style="text-align: center"> <b>CATEGORIES</b></div>
             <div class="btn-group-vertical btn-block">
              <?php foreach ($tech_category as $index => $category) : 
                ?>
                <?= Html::button($category->category, $options = ['value' => $category->id, 'class' => 'btn btn-default technology-category-button hvr-fade padding-right:']) ?>
              <?php endforeach; ?>
              </div>
              
              <div class="viewall" style="background:#f6f9fc;padding-top: 10px;padding-bottom:10px">
              <a href="http://localhost/cportal/itdi-elearning/web/portal/technologytransfer" class="btn1 effect01"><span>View All &nbsp;<i class="glyphicon glyphicon-menu-right"></i></span></a>
              </div>

         
            </div>
            <div  class="col-sm-9" id="categoryTechnology">
            </div>
        </div>
    </div>
  </div>
</section>

<!-- ======= End of Technology Transfer ======= -->



<script>

$('#tech_button').on('click', function() {
  changeTechCategory($('.tech_category_button:first').val());
});

$('.tech_category_button').on('click', function() {
  changeTechCategory($(this).val());
});

function changeTechCategory(id) {
  $.ajax({
    type: 'get',
    url: "<?= Yii::$app->request->baseUrl . '/portal/technology'; ?>",
    data: {
      id: id
    },
    success: function(data) {
      $('#techCategory').empty().html(data);
    }
  });
}

$('.tech_nav').on('click', function() {
  console.log($('.tech_category_button :first').val());
  changeAvpCategory($('.tech_category_button :first').val());
});

openCategoryTab($('.technology-category-button:first').val(), "<?= Yii::$app->request->baseUrl . '/portal/technology'; ?>", '#categoryTechnology');

$('.technology-category-button').click(function() {
      openCategoryTab($(this).val(), "<?= Yii::$app->request->baseUrl . '/portal/technology'; ?>", '#categoryTechnology');
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

