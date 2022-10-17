<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\RfSampleDetails */

?>
<html>
  <body>

    &nbsp;
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
    <div class="rf-sample-details-form">
  <div class="container" style="margin-top: 100px">

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
    </div>
    </div>
    <center>
              <a href="http://localhost/itdi-metro-lims-request-form/web/service/create" class="btn btn-primary" style=""><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Back&nbsp;&nbsp;</a>
    </center>
  </body>
</html>
