<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\RfSampleDetails */

?>

    <div class="rf-sample-details-form">
    <div class="container" style="margin-top: 20px">
    <p>
        <br>
        <center>
        <label>
        <h1><b>
            Your request form has been submitted!

        </h1></b>
        </label>
        </center>
    </p>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            'cal_id',
            'part_id',
            'customer_name',
            'address',
            'contact',
            'email',
            'purpose',
            'customer_type',
            'industry_type',
            'requesting_official',
            'position',
            'sample_brought_by',
            'equipment_description',
            'special_request',
        ],
    ]) ?>
    <center style="padding-bottom:10px">
              <a href="http://localhost/cportal/itdi-elearning/web/portal/create-service" class="btn btn-primary"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Back&nbsp;&nbsp;</a>

    </center>
    </div>
</div>
