<?php

namespace app\modules\cron;

use app\modules\ReconfigureTrait;

/**
 * Class Module
 *
 * @package app\modules\cron
 */
class Module extends \yii\base\Module
{
    use ReconfigureTrait;

    public $controllerNamespace = 'app\modules\cron\controllers';

    public function init()
    {
        parent::init();

        $this->reconfigure(require __DIR__ . '/config/cron.php');
    }
}
