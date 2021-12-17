<?php
$envConf = \app\Environment::get();

return [
    ''                                          => 'default/index',
    // admin
    'admin'                                     => 'admin/default/index',
    'admin/index'                               => 'admin/default/index',
    'admin/login'                               => 'admin/default/login',
    'admin/logout'                              => 'admin/default/logout',
    'admin/<controller:[\w-]+>'                 => 'admin/<controller>/index',
    'admin/<controller:[\w-]+>/<action:[\w-]+>' => 'admin/<controller>/<action>',

    'image/<imageStorageId:\d+>' => 'image/index',
];
