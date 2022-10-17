<?php
use yii\widgets\Breadcrumbs;
use dmstr\widgets\Alert;
?>
<div class="content-wrapper">
    <section class="content">
        <?= 
           Breadcrumbs::widget([
              'homeLink' => [ 
                    'label' => Yii::t('yii', 'Dashboard'),
                    'url' => Yii::$app->homeUrl.'admin',
               ],
              'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
           ]) 
        ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </section>
</div>