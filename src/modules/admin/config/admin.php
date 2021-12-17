<?php

return [
    'app'        => [
        'id'                  => 'yii2-admin',
        'language'            => 'ja',
        'controllerNamespace' => 'app\modules\admin\controllers',
        'homeUrl'             => '/admin/index',
    ],
    'components' => [
        'user'         => [
            'class'           => 'yii\web\User',
            'identityClass'   => 'app\modules\admin\models\Auth',
            'loginUrl'        => ['admin/login'],
            'returnURl'       => ['admin/index'],
            'enableAutoLogin' => true,
        ],
        'session'      => [
            'name'         => 'ADMINSESSID',
            'class'        => 'yii\web\DbSession',
            'sessionTable' => 'admin_sessions',
            'timeout'      => 60 * 60 * 24 * 30, // 30日
        ],
        'errorHandler' => [
            'class'       => 'yii\web\ErrorHandler',
            'errorAction' => 'admin/default/error',
        ],
    ],
];