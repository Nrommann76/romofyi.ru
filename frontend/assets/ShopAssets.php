<?php

namespace frontend\assets;

use yii\web\AssetBundle;


class ShopAssets extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css\animate.min.css',
'css\bootstrap-grid.css',
'css\bootstrap-grid.min.css',
'css\bootstrap-reboot.css',
'css\bootstrap-reboot.min.css',
'css\bootstrap.css',
'css\bootstrap.min.css',
'css\cochin.css',
'css\default-skin.css',
'css\font-awesome.min.css',
'css\icomoon.css',
'css\jquery-ui.css',
'css\jquery.fancybox.min.css',
'css\jquery.mCustomScrollbar.min.css',
'css\meanmenu.css',
'css\nice-select.css',
'css\normalize.css',
'css\owl.carousel.min.css',
'css\responsive.css',
'css\slick.css',
'css\style.css',

    ];
    public $js = [
        'js\bootstrap.bundle.js',
'js\bootstrap.bundle.min.js',
'js\bootstrap.js',
'js\bootstrap.min.js',
'js\custom.js',
'js\jquery-3.0.0.min.js',
'js\jquery.mCustomScrollbar.concat.min.js',
'js\jquery.min.js',
'js\jquery.validate.js',
'js\modernizer.js',
'js\plugin.js',
'js\popper.min.js',
'js\slider-setting.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
    ];
}
