<?php

namespace app\modules\admin\assets;

use yii\web\AssetBundle;

/**
 * Class AdminAsset
 *
 * @package app\modules\admin\assets
 */
class AdminAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $basePath = '@webroot';
    /**
     * @var string
     */
    public $baseUrl = '@web';
    /**
     * @var array
     */
    public $css = [
        'css/admin.css',
    ];
    /**
     * @var array
     */
    public $js = [
    ];
    /**
     * @var array
     */
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}