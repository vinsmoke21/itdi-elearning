<?php

use yii\helpers\Html;
use yii\bootstrap\Modal;
use yii\widgets\DetailView;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use app\models\backend\Seminars;
use app\models\backend\Category;

$formatter = \Yii::$app->formatter;

$this->title = 'PT Services Details';
// $this->params['breadcrumbs'][] = ['label' => 'list', 'url' => ['list']];
// $this->params['breadcrumbs'][] = $this->title;
$this->registerCssFile('@web/css/details.css');
?>


<style>
    .btn {

        color: white;
        font-size: 16px;
        background-color: #10ac84;
        border: none;
    }

    .btn:hover {

        background-color: #333333;
        text-shadow: none;
        color: white;
    }

    .btn:hover .closed {
        color: #333333;
    }

    /* input {
        width: 50px;
        height: 20px;
        border: 1px solid;
        -moz-box-shadow: inset 0 0 4px rgba(0, 0, 0, 0.2);
        -webkit-box-shadow: inset 0 0 4px rgba(0, 0, 0, 0.2);
        box-shadow: inner 0 0 4px rgba(0, 0, 0, 0.2);
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;

    }

    input:focus {
        outline: none !important;
        border-color: #719ECE;
        box-shadow: 0 0 10px #719ECE;
    }

    input button :hover {
        background-color: #10ac84;
    } */



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

    .btn {
        color: white;
        font-size: 16px;
        background-color: #10ac84;
        border: none;
        width: 100px;
    }
</style>

<!-- ======= Portfolio Details Section ======= -->
<div style="margin-top: 50px; margin-bottom: 100px">
    <section class="portfolio-details container">
        <div class="row gy-4">
            <div class="col-lg-8">
                <div class="thumbnail">
                    <img src="<?= Yii::getAlias('@filenameUrl') . '/' . $services->image_details ?>" style="width: 100%; height:80vh; object-fit:cover" />
                </div>
            </div>
            <div class="col-lg-4">
                <div class="portfolio-info">
                    <h3><?= $services["prm_code"]; ?></h3>
                    <ul>
                        <li><strong>Fee</strong>:<?= number_format($services->price) ?></li>
                        <li><strong>Unit Quantity</strong>:<?= $services->quantity ?>x<?= $services->unit ?></li>

                        <?php if ($services->actual_stocks != 0) { ?>

                            <li>
                                <form id='myform' method='POST' class='quantity' action='#'>
                                    <input type='button' value='-' class='qtyminus minus' field='quantity' />
                                    <input type='text' name='quantity' value='1' class='qty' id='qt' oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" />
                                    <input type='button' value='+' class='qtyplus plus' field='quantity' />
                                </form>
                            </li>
                        <?php    } else { ?>

                        <?php } ?>

                        <li><strong>Stock</strong>:<div class="value pull-right" style="padding-right: 230px;"><?= $services->actual_stocks ?></div></li>
                        <li>
                        <?php
                        $btnBuy = 'Check Out';
                        $btnText = 'Not Available';
                        $btnText2 = 'Inquire';
                        $btnClosed = 'disabled';
                        $btnclass = '';
                        if ($services->actual_stocks != 0) {
                            echo Html::button(
                                $btnBuy,
                                [
                                    'value' => Url::to(['/reference-materials/rm-buy', 'id' => $_POST['id']]),
                                    'class' => 'btn btn-default btn-rounded ' . $btnclass, 'id' => 'modalButton', $btnclass => $btnclass
                                ]
                            );
                        } else {
                            echo Html::a(
                                $btnText2,
                                '../portal/inquiry',
                                [
                                    'class' => 'btn btn-default btn-rounded' . $btnText
                                ]
                            );
                        }
                  
                        ?>
                        </li>

                    </ul>
                </div>
            </div>
    </section><!-- End Portfolio Details Section -->
</div>
<?php

Modal::begin([
    'id' => 'modal',
    'size' => 'modal-sl',
    'clientOptions' => [
        'backdrop' => 'static',
        'keyboard' => false,
    ]
]);
echo "<div id='modalContent'></div>";
Modal::end();
?>

<script>
     jQuery(document).ready(($) => {
        $('.quantity').on('click', '.plus', function(e) {
            let $input = $(this).prev('input.qty');
            let val = parseInt($input.val());
            let currentStock = parseInt($(e.target).closest('ul').find('.value').text());
            // $(this).closest('tr').find('.melvs').val();
            console.log(currentStock);
            if(val < currentStock)
                $input.val(val + 1).change();
        });
        
    // jQuery(document).ready(($) => {
    //     $('.quantity').on('click', '.plus', function(e) {
    //         let $input = $(this).prev('input.qty');
    //         let val = parseInt($input.val());
    //         $input.val(val + 1).change();

    //     });

        $('.quantity').on('click', '.minus',
            function(e) {
                let $input = $(this).next('input.qty');
                var val = parseInt($input.val());
                if (val > 1) {
                    console.log(val);
                    $input.val(val - 1).change();
                }
            });



    });
</script>