<?php
return [
    // 環境モード
    'mode'        => 'dev',
    // DB master
    'db'          => [
        'host'     => 'db',
        'database' => 'ebdb',
        'username' => 'db_user',
        'password' => '9q7FXS66d6Up',
    ],
    'aws'         => [
        'key'    => '***',
        'secret' => '***',
    ],
    'fileSystem'  => [
        'class' => 'creocoder\flysystem\LocalFilesystem',
        'path'  => '@runtime/files',
    ],
    'appHost'     => 'http://foo.local',
    'adminHost'   => 'http://foo.local/admin',
    'imageHost'   => 'http://foo.local/image',
    'workerHost'  => 'http://foo.local/worker',
    'noReplyFrom' => [
        'no-reply@foo.local' => '***',
    ],
];
