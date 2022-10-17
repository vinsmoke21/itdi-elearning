<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;
use timurmelnikov\widgets\LoadingOverlayPjax;
use kartik\growl\Growl;
use yii\helpers\ArrayHelper;


$this->title = 'PT Services';
$this->params['breadcrumbs'][] = $this->title;

use app\models\ptservices\PtServices;
use johnitvn\ajaxcrud\CrudAsset;

CrudAsset::register($this);
?>
<style>
    .panel-success>.panel-heading {
        color: #3c763d;
        background-color: #dff0d8;
        border-color: #d6e9c6;
    }

    .table>thead>tr>th,
    .table>tbody>tr>th,
    .table>tfoot>tr>th,
    .table>thead>tr>td,
    .table>tbody>tr>td,
    .table>tfoot>tr>td {
        padding: 8px;
        line-height: 1.42857143;
        vertical-align: top;
        border-top: 1px solid #ddd;
    }

    .table-bordered {
        border: 1px solid #ddd;
    }
</style>

<div class="container">

    <div class="col-lg-12">
        <p class="title-caption" style="margin-top: 70px;">
        <h2 style="color:#fff">Proficiency Testing Services</h2>
        </p>
        <div class="panel panel-success" style="background-color: #d1d8e0;">
            <div class="panel-heading" style="background-color: tranparent;">
                <center><b>MiC Proficiency Testing Program</b>
                    <p>(2022 - 2023)</p>
                </center>
            </div>
            <div class="panel panel-success" style="background-color: #1B1464;">


                <div class="table-responsive">
                    <table class="kv-grid-table table  table-striped kv-table-wrap">

                        <thead class="table-bordered" style="color: #fff;">
                            <tr>
                                <th class="table-bordered" style="text-align:center">Join</th>
                                <!-- <th class="table-bordered" style="text-align:center">Poster</th> -->
                                <th class="table-bordered" style="text-align:center">Year</th>
                                <th class="table-bordered" style="text-align:center">PT Code and <br>Description</th>
                                <th class="table-bordered" style="text-align:center">Target Analysis</th>
                                <th class="table-bordered" style="text-align:center">Start Date</th>
                                <th class="table-bordered" style="text-align:center">Unit <br> Quantity</th>
                                <th class="table-bordered" style="text-align:center">Price</th>
                                <th class="table-bordered" style="text-align:center">Details</th>
                            </tr>
                            <?php foreach ($model as $services) : ?>
                                <tr style="background-color:#a4b0be">
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th style="color:black"><?= $services->category->target_analytes ?></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>

                        </thead>


                        <?php $group = PtServices::find()->where(['category_id' => $services['category_id']])->asArray()->all();

                                foreach ($group as $single) :
                        ?>
                            <tbody>
                                <tr style="text-align: center;">

                                    <td class="table-bordered">
                                        <input class="cb-services" type="checkbox" value="<?= $single['id'] ?>" />
                                    </td>

                                    <td class="table-bordered"><?= $single['year'] ?></td>
                                    <td class="table-bordered"><?= $single['pt_code'] ?></td>
                                    <td class="table-bordered"><?= $single['target_analytes'] ?></td>
                                    <td class="table-bordered"><?= $single['start_date'] ?></td>
                                    <td class="table-bordered"><?= $single['unit_quantity'] ?></td>
                                    <td class="table-bordered"><?= $single['price'] ?></td>
                                    <?php
                                    $link = 'details'
                                    ?>

                                    <td>
                                        <form action="<?= Url::toRoute('/pt-services/' . $link, $schema = true) ?>" method="post">
                                            <input type="hidden" name="_csrf" value="<?= Yii::$app->request->getCsrfToken() ?>" />
                                            <button class="btn btn-success btn-xs " title="details" name="id" value="<?= $single['id'] ?>" type="submit">
                                                <!-- <i class="glyphicon glyphicon-th-list"></i> -->
                                                Details
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        <?php endforeach; ?>
                    <?php endforeach; ?>

                    </table>


                    <div class="form-group pull-left" style="padding-left:5px; padding-top:10px">
                        <?= Html::a(
                            'Join',
                            ['create'],
                            [
                                'role' => 'modal-remote', 'title' => 'Join', 'class' => 'btn btn-success disabled', 'id' => 'service_button',
                                // 'disabled' => 'disabled'
                            ]
                        ) ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php Modal::begin([
    "id" => "ajaxCrudModal",
    "footer" => "", // always need it for jquery plugin
]) ?>
<?php Modal::end(); ?>

<script>
    $(function() {
        

        $(".cb-services").on('change', function() {
            var st = $('.cb-services:checked').length;
            if (st > 0) {
                // $("#service_button").prop("disabled", false);
                $('#service_button').removeClass('disabled');
            } else {
                // $("#service_button").prop("disabled", true);
                $('#service_button').addClass('disabled');
            }
        });
    });
</script>