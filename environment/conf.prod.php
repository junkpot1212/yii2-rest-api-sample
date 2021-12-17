<?php
return [
    // 環境モード
    'mode'        => 'dev',
    // DB master
    'db'          => [
        'host'     => 'aaqpdq4fcquak6.cttxsoshgybv.ap-northeast-3.rds.amazonaws.com',
        'database' => 'ebdb',
        'username' => 'sampleuser',
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
