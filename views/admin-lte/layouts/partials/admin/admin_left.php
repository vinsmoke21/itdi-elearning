<?php
use yii\bootstrap\Nav;
use yii\helpers\Html;

?>
<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <!-- <img src="<?= Yii::$app->request->baseUrl ?>/uploads/user.png" class="img-circle" alt="User Image"/> -->
            </div>
            <div class="pull-left info">
                <p><?= Yii::$app->user->identity->username ?></p>

                <?= Html::a(
                    'My Account',
                    ['/admin/account/index'],
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
                    ['label' => '<i class="fa fa-bar-chart-o"></i><span>Dashboard</span>', 'url' => ['/admin'], 'options' => ['class' => Yii::$app->controller->id == 'default' && Yii::$app->controller->module->id == 'admin' ? 'active' : '']],
                ],
            ]
        );
        ?>
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Admin Settings</li>
            <li class="<?= Yii::$app->controller->module->id == 'gii' ? 'active' : '' ?>">
              <a href="<?= \yii\helpers\Url::to(['/gii']) ?>"> <i class="fa fa-cog"></i> <span>GII</span> </a>
            </li>
            <li class="treeview <?= Yii::$app->controller->module->id == 'rbac' ? 'active' : ''?>">
                <a href="#">
                    <i class="fa fa-users"></i> <span>RBAC</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="<?= Yii::$app->controller->id == 'user' ? 'active' : ''?>">
                        <a href="<?= \yii\helpers\Url::to(['/rbac/user']) ?>">Users</a>
                    </li>
                    <li class="<?= Yii::$app->controller->id == 'assignment' ? 'active' : ''?>">
                        <a href="<?= \yii\helpers\Url::to(['/rbac/assignment']) ?>">Assignments</a>
                    </li>
                    <li class="<?= Yii::$app->controller->id == 'role' ? 'active' : ''?>">
                        <a href="<?= \yii\helpers\Url::to(['/rbac/role']) ?>">Roles</a>
                    </li>
                    <li class="<?= Yii::$app->controller->id == 'permission' ? 'active' : ''?>">
                        <a href="<?= \yii\helpers\Url::to(['/rbac/permission']) ?>">Permissions</a>
                    </li>
                    <li class="<?= Yii::$app->controller->id == 'route' ? 'active' : ''?>">
                        <a href="<?= \yii\helpers\Url::to(['/rbac/route']) ?>">Routes</a>
                    </li>
                    <li class="<?= Yii::$app->controller->id == 'rule' ? 'active' : ''?>">
                        <a href="<?= \yii\helpers\Url::to(['/rbac/rule']) ?>">Rules</a>
                    </li>
                    <li class="<?= Yii::$app->controller->id == 'menu' ? 'active' : ''?>">
                        <a href="<?= \yii\helpers\Url::to(['/rbac/menu']) ?>">Menus</a>
                    </li>
                </ul>
            </li>
        </ul>

    </section>

</aside>
