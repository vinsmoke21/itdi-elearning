<?php
use yii\helpers\Html;
$this->registerCssFile('@web/css/home/main.css');
$this->registerCssFile('@web/css/style.css');
$this->registerCssFile('@web/css/index.css');

?>

<style>
.portfolio .portfolio-item .portfolio-info h4 {
  font-size: 14px; 
  color: #fff;
  font-weight: 600;
  color: #2b2320;

  }
</style>

<html>
<body>
<section id="features" class="features">
  <div class="container">
    <div class="row">
    <div class="col-sm-10 col-sm-offset-1 ml-auto">
    <iframe style="padding-top:100px" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3862.9153412490573!2d121.0496509!3d14.4895492!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397cf13c1948447%3A0x510c7e818adcc6ee!2sDepartment%20of%20Science%20and%20Technology%20-%20Main%20Compound!5e0!3m2!1sen!2sph!4v1605706754991!5m2!1sen!2sph" width="100%" height="400" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
      
      <!-- <img id="contact-img" style="width: 100%;padding-top: 100px; cursor:pointer" onclick="window.open('https://www.google.com.ph/maps/place/Department+of+Science+and+Technology+-+Main+Compound/@14.4895492,121.0496509,17z/data=!4m5!3m4!1s0x3397cf13c1948447:0x510c7e818adcc6ee!8m2!3d14.4899827!4d121.0490021', '_blank')" src="<?= Yii::$app->request->baseUrl ?>/img/map_dost.png"/> -->
      <div id="about_page">
        <h2>You can contact us</h2>
        <p class="contacts"><b>Address:</b> Department of Science and Technology (DOST) Compound, General Santos Avenue, Bicutan, Taguig City, Metro Manila</br></a></p>
        <b>Phone:</b> (+632) 837-2071 loc. 2188 / 2189 / 2198<br/>
        <b>Email:</b> <a href="customer@itdi.com.ph">customer@itdi.com.ph</a>
      </div>
    </div>
    </div>
  </div>
</section>
</body>
</html>