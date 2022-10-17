<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\depdrop\DepDrop;

use app\models\customer\CustomerNmd;
use app\models\customer\CustomerStd;
use app\models\address\Region;
use app\models\address\Province;
use app\models\address\City;

?>

<div class="customer-form row">
    
    <?php $form = ActiveForm::begin(); ?>

    <div class="col-lg-6">
      <br/>
      <?= $form->field($model, 'customer_name')->textInput(['placeholder' => 'Name of Company/Individual/School']) ?>

      <?= $form->field($model, 'customer_type_id')->dropDownList($customer_type, ['prompt'=>'Select Customer Type']) ?>
      <?= $form->field($model, 'industry_type_id')->dropDownList($industry_type, ['prompt'=>'Select Industry Type']) ?>

      <?= $form->field($model, 'contact')->textInput(['maxlength' => true, 'placeholder' => 'Telephone/Mobile Number']) ?>

      <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'placeholder' => 'Optional']) ?>
      <?= $form->field($model, 'fax')->textInput(['maxlength' => true, 'placeholder' => 'Optional']) ?>
      <br/><br/>
    </div>
    <div class="col-lg-6">
      <br/>

      <?php
      if (isset($_GET['id'])) {
        $cust = CustomerNmd::find()->where(['id'=>$_GET['id']])->one();
      }


      echo $form->field($model, 'region_id')->dropDownList($region, [
          'id' => 'regionId',
          'prompt'=>'Select Region']);

      if (isset($_GET['id'])) {
        $prov = ArrayHelper::map(Province::find()->where(['id'=>$cust['province_id']])->orderBy(['id' => SORT_ASC])->all(), 'id', 'name');
      }
      else {
        $prov = [];
      }

      echo $form->field($model, 'province_id')->label('Province/District')->widget(DepDrop::classname(), [
          'data'=> $prov,
          'options'=>['id' => 'province_id', 'placeholder' => 'Select Province/District'],
          'pluginOptions' => [
              'depends' => ['regionId'],
              'placeholder' => 'Select Province/District',
              'url' => Url::to(['/rru/customers/select-province'])
          ]
      ]);

      if (isset($_GET['id'])) {
        $city = ArrayHelper::map(City::find()->where(['id'=>$cust['city_id']])->orderBy(['id' => SORT_ASC])->all(), 'id', 'name');
      }
      else {
        $city = [];
      }

      echo $form->field($model, 'city_id')->label('City')->widget(DepDrop::classname(), [
          'data'=> $city,
          'options'=>['id' => 'city_id', 'placeholder' => 'Select City'],
          'pluginOptions' => [
              'depends' => ['province_id'],
              'placeholder' => 'Select City',
              'url' => Url::to(['/rru/customers/select-city'])
          ]
      ]);
      ?>

      <?= $form->field($model, 'location')->textInput(['maxlength' => true, 'placeholder' => 'House/Bldg./Lot/Street/Block/Village/Subdivision']) ?>

      <div class="form-group pull-right">
        <?= Html::submitButton($model->isNewRecord ? 'Register' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
      </div>

    </div>

    <?php ActiveForm::end(); ?>

</div>
