<?php

namespace app\modules\admin\components;

use app\modules\admin\models\AdminMember;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;

/**
 * Class CommonController
 *
 * @package app\modules\admin\controllers
 *
 * @property AdminMember $member
 */
class CommonController extends Controller
{
    /**
     * @var AdminMember
     */
    private $member;

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs'  => [
                'class'   => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error'   => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class'           => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        $this->member = Yii::$app->user->identity;
    }

    /**
     * @return AdminMember
     */
    public function getMember(): AdminMember
    {
        return $this->member;
    }

    /**
     * @param string $view
     * @param array  $params
     * @return string
     */
    public function render($view, $params = [])
    {
        return parent::render($view, array_merge($params, [
            'member' => $this->member,
        ]));
    }
}
