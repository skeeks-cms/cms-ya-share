<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 15.03.2015
 */
namespace skeeks\cms\yandex\share\widget;
use yii\web\AssetBundle;
/**
 * Class VkAsset
 * @package skeeks\cms\assets
 */
class YaShAsset extends AssetBundle
{
    public $sourcePath = '@skeeks/yandex/share/widget';

    public $js = [
        '//yastatic.net/share/share.js'
    ];
}
