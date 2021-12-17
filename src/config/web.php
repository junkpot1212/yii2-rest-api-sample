<?php

use yii\rest\UrlRule;
use yii\web\JsonParser;

$config = array_merge_recursive(require(__DIR__ . '/common.php'), [
    'id'         => 'yii2-web',
    'bootstrap'  => ['log'],
    'aliases'    => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request'      => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'krogbs49t85hwS-djr4Djgky86lSd',
            'parsers' => [
                'application/json' => JsonParser::class,
            ]
        ],
        'cache'        => [
            'class' => 'yii\caching\FileCache',
        ],
        'user'         => [
            'identityClass'   => 'app\models\User',
            'loginUrl'        => ['/user/login'],
            'returnURl'       => ['/user/index'],
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'default/error',
        ],
        'urlManager'   => [
            'enablePrettyUrl'     => true,
            'enableStrictParsing' => true,
            'showScriptName'      => false,
            'rules'               => [
                [
                    'class'      => UrlRule::class,
                    'controller' => 'member',
                ],
            ],
        ],
        'session'      => [
            'class'        => 'yii\web\DbSession',
            'sessionTable' => 'sessions',
            'timeout'      => 60 * 60 * 24 * 30, // 30日
        ],
    ],
    'modules'    => [
        // admin
        'admin' => [
            'class' => 'app\modules\admin\Module',
        ],
    ],
]);

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][]      = 'debug';
    $config['modules']['debug'] = [
        'class'      => 'yii\debug\Module',
        'allowedIPs' => ['*'],
    ];

    $config['bootstrap'][]    = 'gii';
    $config['modules']['gii'] = [
        'class'      => 'yii\gii\Module',
        'allowedIPs' => ['*'],
        'generators' => [
            'fixture' => [
                'class' => 'elisdn\gii\fixture\Generator',
            ],
        ],
    ];
}

// 本番環境のみ
if ($envConf['mode'] === 'prod') {
    // Google Tag Managerの設定
    $config['bootstrap'][]                    = 'googleTagManager';
    $config['components']['googleTagManager'] = [
        'class'        => 'ezoterik\googleTagManager\GoogleTagManager',
        'tagManagerId' => 'NM29ZMG',
    ];
}

return $config;
