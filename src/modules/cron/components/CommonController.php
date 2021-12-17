<?php

namespace app\modules\cron\components;

use Yii;
use yii\web\Controller;
use yii\web\HttpException;
use yii\web\Response;

/**
 * Class CommonController
 * @package app\modules\worker\controllers
 */
class CommonController extends Controller
{
    /**
     * @var bool
     */
    public $enableCsrfValidation = false;

    /**
     * 初期化
     */
    public function init()
    {
        parent::init();
        Yii::$app->response->format = Response::FORMAT_JSON;
    }

    /**
     * 共通後処理
     * @param \yii\base\Action $action
     * @param mixed            $result
     * @return array|mixed
     * @throws HttpException
     */
    public function afterAction($action, $result)
    {
        return [
            'code' => Yii::$app->response->getStatusCode(),
            'data' => $result,
        ];
    }

    /**
     * 共通エラーメソッド
     */
    public function actionError()
    {
        // 実際のレスポンスは config/worker.php に設定
    }
}