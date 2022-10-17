<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    // public $sourcePath = '@bower/jquery/dist';
    public $jsOptions = array(
      'position' => \yii\web\View::POS_HEAD
    );
    public $css = [
  
        'css/nav.css',
        'css/main.css', //index css
        'css/hover-min.css',
        'css/float-bootstrap.min.css',

      
 
     

    ];


    

  

    public $js = [
        // 'js/script.js',
        // 'https://unpkg.com/sweetalert/dist/sweetalert.min.js',
        'js/modal.js',
        'js/jquery.bpopup.js',
        'js/jquery.bpopup.min.js',
        // 'js/jquery.js'


    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',

    ];


}
