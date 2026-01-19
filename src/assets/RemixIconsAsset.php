<?php

namespace yii\ri\assets;

use yii\web\AssetBundle;

class RemixIconsAsset extends AssetBundle
{
    public $sourcePath = __DIR__ . '/dist';

    public $css = [
        'css/remixicon.css',
    ];
}