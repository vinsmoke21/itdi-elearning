<?php
use yii\bootstrap\Nav;
use yii\helpers\Html;

?>
<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= Yii::$app->request->baseUrl ?>/uploads/user.png" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?= Yii::$app->user->identity->username ?></p>

                <?= Html::a(
                    'My Account',
                    ['/backend/account/index'],
                    ['class' => '']
                ) ?>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form> 
        <!-- /.search form -->
        
        <?=
        Nav::widget(
            [
                'encodeLabels' => false,
                'options' => ['class' => 'sidebar-menu', 'data-widget' => 'tree'],
                'items' => [
                    '<li class="header">Modules</li>',
                    ['label' => '<i class="fa fa-bar-chart-o"></i><span>Dashboard</span>', 'url' => ['backend/index'], 'options' => ['class' => Yii::$app->controller->id == 'default' && Yii::$app->controller->module->id == 'index' ? 'active' : '']],

                     // ['label' => '<i class="fa fa-users"></i><span>Trainings</span>', 'url' => ['elearning/traning'], 'options' => ['class' => Yii::$app->controller->id == 'default' && Yii::$app->controller->module->id == 'index' ? 'active' : '']],

                    ['label' => '<i class="fa fa-users"></i><span>Training</span>', 'url' => ['training/list'], 'options' => ['class' => Yii::$app->controller->id == 'default' && Yii::$app->controller->module->id == 'index' ? 'active' : '']],

                    ['label' => '<i class="fa fa-users"></i><span>Seminar</span>', 'url' => ['seminar/list'], 'options' => ['class' => Yii::$app->controller->id == 'default' && Yii::$app->controller->module->id == 'index' ? 'active' : '']],

                    ['label' => '<i class="fa fa-users"></i><span>Category</span>', 'url' => ['category/list'], 'options' => ['class' => Yii::$app->controller->id == 'default' && Yii::$app->controller->module->id == 'index' ? 'active' : '']],

                    ['label' => '<i class="fa fa-users"></i><span>Avp</span>', 'url' => ['avp/index'], 'options' => ['class' => Yii::$app->controller->id == 'default' && Yii::$app->controller->module->id == 'index' ? 'active' : '']],

                    ['label' => '<i class="fa fa-users"></i><span>UserProfile</span>', 'url' => ['userprofile/index'], 'options' => ['class' => Yii::$app->controller->id == 'default' && Yii::$app->controller->module->id == 'index' ? 'active' : '']],

                    ['label' => '<i class="fa fa-users"></i><span>Attendance</span>', 'url' => ['attendance/index'], 'options' => ['class' => Yii::$app->controller->id == 'default' && Yii::$app->controller->module->id == 'index' ? 'active' : '']],

                    ['label' => '<i class="fa fa-users"></i><span>TechTransfer</span>', 'url' => ['techtransfer/index'], 'options' => ['class' => Yii::$app->controller->id == 'default' && Yii::$app->controller->module->id == 'index' ? 'active' : '']],

                    ['label' => '<i class="fa fa-users"></i><span>TechCategory</span>', 'url' => ['techcategory/index'], 'options' => ['class' => Yii::$app->controller->id == 'default' && Yii::$app->controller->module->id == 'index' ? 'active' : '']],
                    // ['label' => '<i class="fa fa-users"></i><span>AVP Category</span>', 'url' => ['avpcategory/list'], 'options' => ['class' => Yii::$app->controller->id == 'default' && Yii::$app->controller->module->id == 'index' ? 'active' : '']],

                  




                   
                ],
            ]
        );
        ?>


</aside>
