<?php

namespace app\controllers;


use app\models\infrastructures\Members;
use yii\rest\ActiveController;

class MemberController extends ActiveController
{
    public $modelClass = Members::class;
}
