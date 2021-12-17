<?php
return [
    // 環境モード
    'mode'        => 'dev',
    // DB master
    'db'          => [
        'host'     => 'db',
        'database' => 'sampledb',
        'username' => 'db_user',
        'password' => 'EfnyF4CYoGRTZMVT',
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
