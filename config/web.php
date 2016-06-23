<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'Parse-it-api',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log','gii'],
    'timeZone' => 'Europe/Rome',
    'components' => [
        'request' => [            
            'cookieValidationKey' => 'Ul9AlRT6RiI1S2E9LdaiqWTgvHwXZL8V',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        /*
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => false,
        ],
         * 
         */
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
        'db' => require(__DIR__ . '/db.php'),
        'urlManager' => [
        'class' => 'yii\web\UrlManager',
        // Disable index.php
        'showScriptName' => false,
        // Disable r= routes
        'enablePrettyUrl' => true,
        //'enableStrictParsing' => true,
        'rules' => array(
                ['class' => 'yii\rest\UrlRule', 'controller' => '1/users'],
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
        ),
        ],
    ],
    'params' => $params,
     'modules' => [
         '1' => [
            'class' => 'app\modules\v1\Module',
        ],
         'user' => [
            'class' => 'dektrium\user\Module',
        ],
    ],
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
         'allowedIPs' => ['127.0.0.1', '::1', '192.168.99.*'] // adjust this to your needs
    ];
}

return $config;
