<?php
/**
 * Created by PhpStorm.
 * User: rashad
 * Date: 2/28/16
 * Time: 19:50
 */

namespace app\assets;

use yii\web\AssetBundle;
use Yii;

// set @themes alias so we do not have to update baseUrl every time we change themes
Yii::setAlias('@themes', Yii::$app->view->theme->baseUrl);

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 *
 * @since 2.0
 *
 * Customized by Nenad Živković
 */
class ManagerAssets extends AssetBundle{
  public $basePath = '@webroot';
  public $baseUrl = '@themes';

  public $css = [
    'css/bootstrap.min.css',
  ];

  public $js = [
    'js/jquery.min',
  ];

  public $jsOptions = [
    'position' => \yii\web\View::POS_HEAD,
  ];

  public $depends = [
    'yii\web\YiiAsset',
  ];
}