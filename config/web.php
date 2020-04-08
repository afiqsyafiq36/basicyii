<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'name' => 'Basic Yii Application',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],

    // 'defaultRoute' => 'country/view', //set kan defzult route ke site controller 'default'
    //'catchAll' => 'site/index',

    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [

        'assetManager' => [
            //the last modification timestamp will be appended to all published assets
            'appendTimestamp' => true,
            'bundles' => [
                
                //included jquery function
                // 'yii\web\JqueryAsset' => [
                //     'sourcePath' => null,
                //     'js' => ['//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js']
                // ],
                // 'yii\bootstrap\BootstrapPluginAsset' => [
                //     'sourcePath' => null,
                //     'js' => ['/js/bootstrap.js'] //NB: file was patched
                // ],
                // 'yii\bootstrap\BootstrapAsset' => [
                //     'sourcePath' => null,
                //     'css' => ['/css/bootstrap.min.css']
                // ],
            ],
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'QVPtSbz80AnszeaI5FqI49UG9rgPWMWp',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
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
        'db' => $db,
        
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        
    ],
    'modules' => [
        'hello' => [
            'class' => 'app\modules\hello\Hello', //modules route yg baru ditambah
        ],
    ],

    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
