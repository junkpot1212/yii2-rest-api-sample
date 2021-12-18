<?php

namespace app\controllers;


use app\models\infrastructures\Members;
use yii\filters\Cors;
use yii\rest\ActiveController;

class MemberController extends ActiveController
{
    public function behaviors()
    {
        return [
            'corsFilter' => [
                'class' => Cors::class,
                'cors'  => [
                    'Origin'                           => ['http://localhost:8000'],
                    'Access-Control-Request-Method'    => ['GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'HEAD', 'OPTIONS'],
                    'Access-Control-Request-Headers'   => ['*'],
                    'Access-Control-Allow-Credentials' => true,
                    'Access-Control-Max-Age'           => 86400,
                    'Access-Control-Expose-Headers'    => [],
                ],
            ],
        ];
    }

    public $modelClass = Members::class;
}
