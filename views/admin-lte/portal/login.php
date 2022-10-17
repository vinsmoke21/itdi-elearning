<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use timurmelnikov\widgets\LoadingOverlayPjax;
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \mdm\admin\models\form\Login */
$this->registerCssFile('@web/css/login.css');
$this->title = 'ITDI | Login';

?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
</head>
<body>
  <div class="contact-wrapper">
    <div class="left_side">
        <img src="../img/oneeye.gif" style="width:110%">
    </div>
    <div class="right_side">
      <h2>ITDI System Portal</h2>
      <div class="login-content">
				<?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
				<!-- <img src="../uploads/user.png"> -->
				<!-- <h2 class="title">ITDI SYSTEM PORTAL</h2> -->
				
				
				<div class="">
				<?= $form->field ($model, 'username')->textInput(['placeholder' => "Username"])->label(false) ?>
        </div>
        <div>
        <?= $form->field($model, 'password')->passwordInput(['placeholder' => "Password", ])->label(false) ?>
        </div>

		

		
				
                <div class="form-row"></div>
                <div class="form-row"> 
				<?= Html::submitButton('Login', ['class' => 'form-row', 'name' => 'login-button', 'id' => 'login-button']) ?>
                </div>
				<?php ActiveForm::end(); ?>
			</div>
      <div class="socials-wrapper">
        <h2>Login with your Social Account</h2>
        <ul>
          <li><a href="#" class="facebook"><i class="fab fa-facebook-square"></i></a></li>
          <li><a href="#" class="twitter"><i class="fab fa-twitter"></i></a></li>
          <li><a href="#" class="instagram"><i class="fab fa-instagram"></i></a></li>
          <li><a href="#" class="youtube"><i class="fab fa-youtube"></i></a></li>
        </ul>
      </div>
    </div>
  </div>
</body>
</html>

<style>
@import url("https://fonts.googleapis.com/css?family=Rajdhani:500,700&display=swap");


body {
  -webkit-box-align: center;
  align-items: center;
  background: #614385;   
  background: -webkit-linear-gradient(to right, #516395, #614385);
  /* background: linear-gradient(to right, #516395, #614385);  */
  display: -webkit-box;
  display: flexbox;
  font-family: "Rajdhani", sans-serif;
  height: 100vh;
  -webkit-box-pack: center;
  justify-content: center;
  font-size: 14px;
} 
.contact-wrapper{
  background:#fff;
  box-shadow: 3px 3px 2px rgba(0,0,0,0.15);
  border-radius: .75em;
  padding:4em 2em;
  width:60em;
  display:flex;
  align-items:center;
  justify-content:space-between;
  justify-content: flex-start;
  
}

.left_side,
.right_side{
  width:100%;
  padding:9 9em;
  display: grid;
 justify-content: flex-end;
 align-items: center;
}
.right_side > h2{
  color:#3e3f5e;
  font-size: 1.75em;
  text-align: center;
}
form{
  margin:2em 0;
  
}
form > .form-row{
  display:-webkit-box;
  display:flex;
  margin:.75em 0;
  position:relative;
}
form > .form-row > span{
  background:#fff;
  color:#adafca;
  display:inline-block;
  font-weight: 400;
  left:1em;
  padding:0 .5em;
  position:absolute;
  pointer-events:none;
  -webkit-transform:translateY(-50%); 
  transform:translateY(-50%); 
  top:50%;
  -webkit-transition: all 300ms ease;
  transition: all 300ms ease;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
 
}
form > .form-row > input,
form > .form-row > button{
  border-radius: .5em;
  padding:1em .5em;
  width:100%;
  font-family: inherit;
}
form > .form-row > input{
  font-weight: bold;
  -webkit-transition:100ms ease all;
  transition:100ms ease all;
  width:100%;
}
form > .form-row > input[type=text],
form > .form-row > input[type=password]{
  border:.075em solid #ddd;
}
form > .form-row > input:valid + span{
  top:0;
  font-size: .90rem;
}
form > .form-row > input:focus + span{
  top:0;
  color: #7b5dfa;
  font-weight: 600;
}
form > .form-row > input:required{
  box-shadow: none;
}
form > .form-row > input:focus{
  border-color:#7b5dfa;
  outline:none;
}
form > .form-row > input:focus:invalid{
  box-shadow: none;
  top:50%;
}
form > .form-row > input:focus:valid{
  top:0;
}
form > .form-row > button{
  background-color:#7b5dfa;
  border:.10em solid #7b5dfa;
  color:#fff;
  cursor: pointer;
  font-weight: bold;
  transition:all 300ms ease;
}
form > .form-row > button:focus{
  border:0.1em solid #533cf8;
  outline:none;
}
form> .form-row > button:hover{
  background:#6744f9;
  
}
.socials-wrapper > h2{
  background:#fff;
  color:#3e3f5e;
  font-size: 1rem;
  position: relative;
  text-align: center;
  z-index: 10;
  
}
.socials-wrapper > h2:before,
.socials-wrapper > h2:after{
  background:#d3d3e2;
  content:'';
  display: block;
  height:.10em;
  position: absolute;
  top:50%;
  -webkit-transform: translateY(-50%);
  transform: translateY(-50%);
  width:17.5%;
  
}
.socials-wrapper > h2:before{
  left:0;
  
}
.socials-wrapper > h2:after{
  right:0;
  
}
.socials-wrapper > ul{
  display:-webkit-box;
  display:flex;
  list-style: none;
  -webkit-box-pack: center;
  justify-content:center;
  padding:0;
 
 
}
.socials-wrapper > ul > li{
  margin:.5em;

 
}
.socials-wrapper > ul > li > a{
  -webkit-box-align:center;
  align-items:center;
  border-radius: .5em;
  color:#fff;
  display:-webkit-box;
  height:2em;
  -webkit-box-pack: center;
  justify-content:center;
  text-align: center;
  text-decoration: none;
  -webkkit-transition:all 300ms ease;
  transition:all 300ms ease;
  width:2em;
  
 
}
.socials-wrapper > ul > li > a.facebook{
  background:#3763d2;
}
.socials-wrapper > ul > li > a.twitter{
  background:#1abcff;
}
.socials-wrapper > ul > li > a.instagram{
  background:#ff00aa;
}
.socials-wrapper > ul > li > a.youtube{
  background:#fd434f;
}
.socials-wrapper > ul > li > a:hover{
  -webkit-transform:translateY(-0.50em);
   transform:translateY(-0.50em);
   
}

@media (max-width:992px){ 
  .socials-wrapper > h2:after,
  .socials-wrapper > h2:before{
    width:10.5%;
   
  }
}
@media (max-width:767px){
  .contact-wrapper{
    flex-direction: column;
    display: grid;
    justify-content: flex-start;
    align-items: center;
    text-align: center;
  

  }
  .left_side,
  .right_side{
    width:100%;
    padding:0 3em;
    margin-bottom: 100px;
    
  }
  .socials-wrapper > h2:after,
  .socials-wrapper > h2:before{
    width:10.5%;
 
      
  }
}

  
</style>