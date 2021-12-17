<?php
$envConf = \app\Environment::get();

Yii::setAlias('@tests', dirname(__DIR__) . '/tests');

$vendorPath = dirname(dirname(__DIR__)) . '/vendor';

$config = [
    'language'    => 'ja-JP',
    'vendorPath'  => dirname(dirname(__DIR__)) . '/vendor',
    'runtimePath' => dirname(dirname(__DIR__)) . '/runtime',
    'basePath'    => dirname(__DIR__),
    'bootstrap'   => ['log'],
    'components'  => [
        'mailer'           => [
            'class'            => 'yii\swiftmailer\Mailer',
            'transport'        => [
                'class'      => 'Swift_SmtpTransport',
                'host'       => 'email-smtp.us-east-1.amazonaws.com',  // e.g. smtp.mandrillapp.com or smtp.gmail.com
                'username'   => $envConf['aws']['key'],
                'password'   => $envConf['aws']['secret'],
                'port'       => '587', // Port 25 is a very common port too
                'encryption' => 'tls', // It is often used, check your provider or mail server specs
            ],
            'useFileTransport' => YII_DEBUG,
        ],
        'log'              => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets'    => [
                [
                    'class'  => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db'               => [
            'class'             => 'yii\db\Connection',
            'dsn'               => 'mysql:host=' . $envConf['db']['host'] . ';dbname=' . $envConf['db']['database'],
            'username'          => $envConf['db']['username'],
            'password'          => $envConf['db']['password'],
            'enableSchemaCache' => !YII_DEBUG,
            'schemaCache'       => 'fileCache',
            'charset'           => 'utf8',
        ],
        'fileSystem'       => $envConf['fileSystem'],
    ],
];

return $config;
