<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class ShopAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/animate.min.css',
        'css/cochin.css',
        'css/default-skin.css',
        'css/font-awesome.min.css',
        'css/icomoon.css',
        'css/jquery.fancybox.min.css',
        'css/jquery.mCustomScrollbar.min.css',
        'css/jquery-io.css',
        'css/meanmenu.css',
        'css/nice-select.css',
        'css/normalize.css',
        'css/owl.carousel.min.css',
        'css/responsive.css',
        'css/slick.css',
        'css/style.css',
    ];
    public $js = [
        'js/custom.js',
        'js/jquery.mCustomScrollbar.concat.min.js',
        'js/jquery.validate.js',
        'js/modernizer.js',
        'js/plugin.js',
        'js/popper.min.js',
        'js/slider-setting.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
    ];
}
