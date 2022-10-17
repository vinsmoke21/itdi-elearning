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


$this->title = 'Reference Materials';
$this->params['breadcrumbs'][] = $this->title;

use app\models\ptservices\PtServices;
use johnitvn\ajaxcrud\CrudAsset;

CrudAsset::register($this);
?>
<style>
    body {
        background-color: whitesmoke;
    }

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

    .qty {
        width: 40px;
        height: 25px;
        text-align: center;

    }

    input.qtyplus {
        width: 25px;
        height: 25px;
    }

    input.qtyminus {
        width: 25px;
        height: 25px;
    }

    .btn1 {
        color: #fff;
        background-color: #1abc9c;
    }
</style>

<div class="container">

    <div class="col-lg-12">
        <p class="title-caption" style="margin-top: 70px; color: whitesmoke">
            .
        </p>
        <div class="panel-color" style="background-color:#16a085">
            <div class="panel-heading">
                <center><b style="font-size: 15px; color:#fff">Reference Materials</b>
                    <p style="color:#fff">(2022 - 2023)</p>
                </center>
            </div>
            <div class="panel panel-success" style="background-color:#273c75">


                <div class="table-responsive">
                    <table class="kv-grid-table table  table-striped kv-table-wrap">

                        <thead class="table-bordered" style="color: #fff;">
                            <tr>
                                <th class="table-bordered" style="text-align:center">Details</th>
                                <!-- <th class="table-bordered" style="text-align:center">Poster</th> -->
                                <th class="table-bordered" style="text-align:center">Year</th>
                                <th class="table-bordered" style="text-align:center">PT Code and <br>Description</th>
                                <!-- <th class="table-bordered" style="text-align:center">Target Analysis</th> -->
                                <!-- <th class="table-bordered" style="text-align:center">Start Date</th> -->
                                <th class="table-bordered" style="text-align:center">Unit <br> Quantity</th>
                                <th class="table-bordered" style="text-align:center">Quantity</th>
                                <th class="table-bordered" style="text-align:center">Stock</th>
                                <th class="table-bordered" style="text-align:center">Price</th>
                                <th class="table-bordered" style="text-align:center">Buy</th>
                            </tr>
                        </thead>


                        <?php
                        foreach ($model as $single) :
                        ?>
                            <tbody>
                                <tr style="text-align: center;">
                                    <?php
                                    $link = 'details'
                                    ?>

                                    <td>
                                        <form action="<?= Url::toRoute('/reference-materials/' . $link, $schema = true) ?>" method="post">
                                            <input type="hidden" name="_csrf" value="<?= Yii::$app->request->getCsrfToken() ?>" />
                                            <button class="btn btn1 btn-xs" title="details" name="id" value="<?= $single['id'] ?>" type="submit">
                                                Details
                                            </button>
                                        </form>
                                    </td>
                                    <td class="table-bordered"><?= $single['year_generated'] ?></td>
                                    <td class="table-bordered"><?= $single['prm_code'] ?></td>
                                    <td class="table-bordered"><?= $single['quantity'] ?>x<?= $single['unit'] ?></td>
                                    <td>
                                        <form id='myform' method='POST' class='quantity' value='<?= $single['actual_stocks'] ?>'>
                                            <input type='button' value='-' class='qtyminus minus qt' field='quantity' id="textBox" disabled />
                                            <input type='text' name='quantity' value='1' class='qty qt qtinput' disabled oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1').replace(/^0+/, '');" />
                                            <input type='button' value='+' class='qtyplus plus qt' field='quantity' id='textBox' disabled />
                                        </form>
                                    </td>
                                    <td class="table-bordered stock"><?= $single['actual_stocks'] ?></td>
                                    <td class="table-bordered"><?= $single['price'] ?></td>
                                    <?php if ($single->actual_stocks != 0) { ?>

                                        <td class="table-bordered">
                                            <input class="cb-services" type="checkbox" value="<?= $single['id'] ?>" id="checkBox" />
                                        </td>
                                    <?php    } else { ?>
                                        <td></td>
                                    <?php } ?>

                                </tr>
                            </tbody>
                        <?php endforeach; ?>

                    </table>


                    <div class="form-group pull-right" style="padding-right:5px; padding-top:10px">
                        <?= Html::a(
                            'Check Out',
                            ['create'],
                            [
                                'role' => 'modal-remote', 'title' => 'Buy', 'class' => 'btn btn1 disabled', 'id' => 'service_button', 'type' => 'submit'
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

    $(function() {
        if (cond) {
            alert("true");
        } else {
            alert("false");
        }

        $(".qt-services").on('change', function() {
            var st = $('.qt-services:checked').length;
            if (st > 0) {
                // $("#service_button").prop("disabled", false);
                $('#services_button').removeClass('disabled');
            } else {
                // $("#service_button").prop("disabled", true);
                $('#services_button').addClass('disabled');
            }
        });
    });
</script>

<script>
    // add/subtract
    jQuery(document).ready(($) => {
        $('.quantity').on('click', '.plus', function(e) {
            let $input = $(this).prev('input.qty');
            let val = parseInt($input.val());
            let currentStock = parseInt($(e.target).closest('tr').find('.stock').text());
            // $(this).closest('tr').find('.melvs').val();
            console.log(currentStock);
            if (val < currentStock)
                $input.val(val + 1).change();
        });

        $('.quantity').on('click', '.minus',
            function(e) {
                let $input = $(this).next('input.qty');
                var val = parseInt($input.val());
                if (val > 1) {
                    // console.log(val);
                    $input.val(val - 1).change();
                }
            });

        $('body').on('click', '.cb-services', (e) => {
            let elements = $(e.target).closest('tr').find('.qt');
            $(elements).each((i, el) => {
                let isDisabled = $(el).prop('disabled');
                $(el).prop('disabled', !isDisabled);
                // console.log(isDisabled);
            });
        });

    });
</script>