<?php

use yii\helpers\Html;

?>


<!-- ======= Technology Transfer ======= -->
<section id="proficiency-testing">
  <div class="container">
    <div class="row">
      <header class="section-header">
        <p style="margin-top: -40px;">Proficiency Testing</p>
      </header>
        <div class="col-sm-12" data-aos="fade-up">
          <div class="col-sm-3">
            <div class="line-heading" data-aos="fade-up" style="text-align: center"> <b>CATEGORIES</b></div>
            <div class="btn-group-vertical btn-block">
              <?php foreach ($section as $index => $section_name) :
              ?>
                <?= Html::button($section_name->section_name, $options = [
                  'value' => $section_name->id,
                  'class' => 'btn btn-default section-button hvr-fade',
                  'style' => 'padding-right:80%; font-size: 12px'
                ]) ?>
              <?php endforeach; ?>
            </div>
            <div class="viewall" style="background:#f6f9fc;padding-top: 10px;padding-bottom:10px">
              <a href="http://localhost/cportal/itdi-elearning/web/portal/proficiency-testing" class="btn1 effect01"><span>View All &nbsp;<i class="glyphicon glyphicon-menu-right"></i></span></a>
            </div>
          </div>
          <div class="col-sm-9" id="categoryProficiency"></div>
        </div>
    </div>
  </div>
</section>

<!-- ======= End of Technology Transfer ======= -->



<script>
  $('#pt_button').on('click', function() {
    changeTechCategory($('.section_button:first').val());
  });

  $('.section_button').on('click', function() {
    changeTechCategory($(this).val());
  });

  function changeSection(id) {
    $.ajax({
      type: 'get',
      url: "<?= Yii::$app->request->baseUrl . '/portal/proficiency'; ?>",
      data: {
        id: id
      },
      success: function(data) {
        $('#Section').empty().html(data);
      }
    });
  }

  $('.pt_nav').on('click', function() {
    console.log($('.section_button :first').val());
    changeAvpCategory($('.section_button :first').val());
  });

  openCategoryTab($('.section-button:first').val(), "<?= Yii::$app->request->baseUrl . '/portal/proficiency'; ?>", '#categoryProficiency');

  $('.section-button').click(function() {
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