<?php

use kartik\mpdf\Pdf;

$params = require __DIR__ . '/params.php';

$itdidb_elearning_auth = require __DIR__ . '/db/itdidb_elearning_auth.php';
$itdidb_user = require __DIR__ . '/db/itdidb_user.php';
$itdidb_cportal = require __DIR__ . '/db/itdidb_cportal.php';
$itdidb_pt = require __DIR__ . '/db/itdidb_pt.php';
$itdidb_pt_rf = require __DIR__ . '/db/itdidb_pt_rf.php';
$itdidb_pt_services = require __DIR__ . '/db/itdidb_pt_services.php';
$itdidb_hris = require __DIR__ . '/db/itdidb_hris.php';
$itdidb_pmis = require __DIR__ . '/db/itdidb_pmis.php';
$itdidb_customer = require __DIR__ . '/db/itdidb_customer.php';
$system_db_auth = require __DIR__ . '/db/system_db_auth.php';
$system_db_lab = require __DIR__ . '/db/system_db_lab.php';
$system_db_rf = require __DIR__ . '/db/system_db_rf.php';
$system_db_services = require __DIR__ . '/db/system_db_services.php';
// $db_nlims = require __DIR__ . '/db/db_nlims.php';
$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'timeZone' => 'Asia/Manila',
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'formatter' => [
            'class' => 'yii\i18n\formatter',
            'thousandSeparator' => ',',
            'decimalSeparator' => '.',
            'currencyCode' => 'P'
        ],
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@app/views' => '@app/views/admin-lte'
                ],
            ],
        ],
        'request' => [
            'cookieValidationKey' => '9Xg-2cjY272puwEAq1L07Urqxb-tGfM9',
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ]
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'loginUrl' => ['portal/login'],
        ],
        'errorHandler' => [
            'errorAction' => 'portal/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtpout.asia.secureserver.net',
                'username' => 'customer@itdi.com.ph',
                'password' => 'mithi@2020',
                'port' => '80',
                'encryption' => '',
            ],
            'useFileTransport' => false,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $itdidb_elearning_auth,
        'user_db' => $itdidb_user,
        'itdidb_cportal' => $itdidb_cportal,
        'itdidb_pt' => $itdidb_pt,
        'itdidb_pt_rf' => $itdidb_pt_rf,
        'itdidb_pt_services' => $itdidb_pt_services,
        'itdidb_pmis' => $itdidb_pmis,
        'itdidb_customer' => $itdidb_customer,
        'system_db_auth' => $system_db_auth,
        'system_db_lab' => $system_db_lab,
        'system_db_rf' => $system_db_rf,
        'system_db_services' => $system_db_services,
        'itdidb_customer' => $itdidb_customer,
        'itdidb_hris' => $itdidb_hris,
        // 'db_nlims' => $db_nlims,
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'usersprofile/create/<tn:[\w\'-]+>' => 'usersprofile/create/',
                'usersprofile/register/<tn:[\w\'-]+>' => 'usersprofile/register/',
            ],
        ],
    ],
    'modules' => [
        'admin' => [
            'class' => 'app\modules\admin\Module',
        ],

        // EDIT THIS FOR NEW MODULES
        'backend' => [
            'class' => 'app\modules\backend\Module',
        ],

        'api' => [
            'class' => 'app\modules\api\Module',
        ],
        //        'agency' => [
        //            'class' => 'app\modules\agency\Module',
        //        ],

        // USE THIS FOR KARTIK GRIDVIEW
        'gridviewSummary' =>  [
            'class' => '\kartik\grid\Module',
        ]
    ],

    // 'as access' => [
    //     'class' => 'mdm\admin\components\AccessControl',
    //     'allowActions' => [
    //         'portal/*',
    //         'admin/*',
    //         'backend/*',
    //         'service/*',
    //         'details/*',


    //     ]
    // ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    //    $config['bootstrap'][] = 'debug';
    //    $config['modules']['debug'] = [
    //        'class' => '',
    //        'class' => 'yii\debug\Module',
    // uncomment the following to add your IP if you are not connecting from localhost.
    //'allowedIPs' => ['127.0.0.1', '::1'],
    //    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
